import pyodbc

class ConexionDB():
    def __init__(self): 
        try:    
            self.connection = pyodbc.connect('DRIVER={SQL Server};SERVER=INESHV;'\
            'DATABASE=Alcolimetro;Trusted_Connection=yes;')
            self.cursor = self.connection.cursor()
            self.errMss = ''
        except Exception as ex:
            self.errMss = ex
            self.connection = None
            self.cursor = None

    def get_personas(self, query):
        try:
            self.cursor.execute(query)
            return self.cursor.fetchall()
        except Exception as ex:
            print(f' Error al ejecutar la consulta: {ex}')
            print(f'Error de conexion: {self.errMss}')
            return []