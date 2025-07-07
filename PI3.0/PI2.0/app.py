from flask import Flask, render_template, request, redirect, url_for, flash, jsonify
import pyodbc
from datetime import datetime

app = Flask(__name__)
app.secret_key = 'SoyBienM0cha1'

# Conexión a SQL Server 
def get_db():
    return pyodbc.connect(
        'DRIVER={SQL Server};'
        'SERVER=IANDAVID\SQLSERVER;'
        'DATABASE=Alcolimetro;'
        'UID=IANDAVID\tand;'
        'PWD=SoyBienM0cha1;'
    )

# Ruta principal 
@app.route('/')
def index():
    return render_template('index.html')

# RUTAS PRINCIPALES
@app.route('/datospersonales')
def datospersonales():
    matricula = request.args.get('matricula')
    if not matricula:
        flash("Se requiere una matrícula válida")
        return redirect(url_for('index'))
    
    conn = get_db()
    cursor = conn.cursor()
    
    cursor.execute(
        "SELECT e.idPersona, e.Matricula, p.nombre, p.APaterno, p.AMaterno, p.Edad "
        "FROM estudiantes e "
        "JOIN personas p ON e.idPersona = p.idPersona "
        "WHERE e.Matricula = ?", 
        (matricula,))
    
    estudiante = cursor.fetchone()
    conn.close()
    
    if not estudiante:
        flash("No se encontró el estudiante")
        return redirect(url_for('index'))
    
    return render_template('datospersonales.html', 
                         estudiante=estudiante,
                         matricula=matricula)

# RUTAS DE REGISTRO
@app.route('/registro')
def registro():
    matricula = request.args.get('matricula')
    if not matricula:
        flash("Se requiere una matrícula válida")
        return redirect(url_for('index'))
    
    conn = get_db()
    cursor = conn.cursor()
    
    # Datos del estudiante
    cursor.execute(
        "SELECT e.idPersona, e.Matricula, p.nombre, p.APaterno, p.AMaterno, p.Edad "
        "FROM estudiantes e "
        "JOIN personas p ON e.idPersona = p.idPersona "
        "WHERE e.Matricula = ?", 
        (matricula,))
    estudiante = cursor.fetchone()
    
    # Registros de alcohol
    cursor.execute(
        "SELECT r.idRegistro, r.Fecha, r.Medicion, r.Comentario, a.nombre as autorizador "
        "FROM registros r "
        "JOIN personas a ON r.idAutorizado = a.idPersona "
        "WHERE r.idPersona = ? "
        "ORDER BY r.Fecha DESC", 
        (estudiante.idPersona,))
    registros = cursor.fetchall()
    
    conn.close()
    
    return render_template('registro.html',
                         estudiante=estudiante,
                         registros=registros,
                         matricula=matricula)

@app.route('/registroalcohol', methods=['GET', 'POST'])
def registroalcohol():
    if request.method == 'POST':
        # Procesar formulario
        data = request.form
        conn = get_db()
        cursor = conn.cursor()
        
        try:
            cursor.execute(
                "INSERT INTO registros (Fecha, idPersona, idAutorizado, Medicion, Comentario) "
                "VALUES (?, ?, ?, ?, ?)",
                (
                    datetime.now().strftime('%Y-%m-%d'),
                    data['persona'],
                    data['personal'],
                    data['medicion'],
                    data['comentario']
                ))
            conn.commit()
            flash("Registro exitoso")
        except Exception as e:
            conn.rollback()
            flash(f"Error: {str(e)}")
        finally:
            conn.close()
        
        return redirect(url_for('registro', matricula=data['matricula']))
    
    # GET: Mostrar formulario
    matricula = request.args.get('matricula')
    if not matricula:
        flash("Se requiere una matrícula válida")
        return redirect(url_for('index'))
    
    conn = get_db()
    cursor = conn.cursor()
    
    # Datos del estudiante
    cursor.execute(
        "SELECT e.idPersona, e.Matricula, p.nombre, p.APaterno, p.AMaterno, p.Edad "
        "FROM estudiantes e "
        "JOIN personas p ON e.idPersona = p.idPersona "
        "WHERE e.Matricula = ?", 
        (matricula,))
    estudiante = cursor.fetchone()
    
    # Operadores autorizados
    cursor.execute(
        "SELECT a.idAutorizado, p.Nombre "
        "FROM autorizados a "
        "JOIN personas p ON a.idPersona = p.idPersona")
    operadores = cursor.fetchall()
    
    conn.close()
    
    return render_template('registroalcohol.html',
                         estudiante=estudiante,
                         operadores=operadores,
                         ahora=datetime.now())

    
@app.route('/buscar', methods=['POST'])
def buscar():
    matricula = request.form.get('matricula', '').strip()
    errores = {}

    if not matricula:
        errores['matricula'] = "La matrícula no puede estar vacía"
        return render_template('index.html', errores=errores)

    try:
        conn = get_db()
        cursor = conn.cursor()

        cursor.execute("SELECT * FROM estudiantes WHERE Matricula = ?", (matricula,))
        estudiante = cursor.fetchone()
        conn.close()

        if estudiante:
            return redirect(url_for('datospersonales', matricula=matricula))
        else:
            flash("La matrícula no fue encontrada")
            return render_template('index.html')

    except Exception as e:
        flash(f"Error al buscar: {str(e)}")
        return render_template('index.html')

    
# RUTAS API
@app.route('/buscar_autocomplete')
def buscar_autocomplete():
    query = request.args.get('query', '').strip()
    if not query:
        return jsonify([])
    
    conn = get_db()
    cursor = conn.cursor()
    
    cursor.execute(
        "SELECT e.Matricula, p.Nombre, p.APaterno, p.AMaterno "
        "FROM estudiantes e "
        "JOIN personas p ON e.idPersona = p.idPersona "
        "WHERE e.Matricula LIKE ? "
        "ORDER BY e.Matricula",
        (f"{query}%",))
    
    resultados = [{
        'Matricula': row.Matricula,
        'Nombre': f"{row.Nombre} {row.APaterno} {row.AMaterno}"
    } for row in cursor.fetchmany(5)]
    
    conn.close()
    return jsonify(resultados)

@app.route('/guardar_encuesta', methods=['POST'])
def guardar_encuesta():
    data = request.form
    conn = get_db()
    cursor = conn.cursor()
    
    try:
        cursor.execute(
            "INSERT INTO encuesta (nombre, email, satisfaccion, comentario, fecha) "
            "VALUES (?, ?, ?, ?, ?)",
            (
                data['nombre'],
                data['email'],
                data['satisfaccion'],
                data['comentario'],
                datetime.now().strftime('%Y-%m-%d')
            ))
        conn.commit()
        return jsonify({'status': 'success'})
    except Exception as e:
        conn.rollback()
        return jsonify({'status': 'error', 'message': str(e)})
    finally:
        conn.close()

if __name__ == '__main__':
    app.run(debug=True)