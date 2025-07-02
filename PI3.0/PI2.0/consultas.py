from src.Conexion import ConexionDB

dbContext = ConexionDB()

resultado = ''
if dbContext.cursor:
    resultado = dbContext.get_personas(
        '''
        SELECT Carreras.Carrera, 
               (
                   SELECT COUNT(*) 
                   FROM Estudiantes
                   INNER JOIN AsignacionTutores ON Estudiantes.idAsignacion = AsignacionTutores.idAsignacion
                   INNER JOIN Grupos ON AsignacionTutores.idGrupo = Grupos.idGrupo
                   WHERE Grupos.idCarrera = Carreras.idCarrera
               ) AS TotalEstudiantes
        FROM Carreras
        '''
    )
    for linea in resultado:
        print(linea)
else:
    print(f'No se pudo realizar la consulta: {dbContext.errMss}')
    print(f'Error de conexion: {dbContext.errMss}')