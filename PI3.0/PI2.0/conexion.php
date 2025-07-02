<?php
//Servidor, usuario, password y base de datos
$conn= mysqli_connect("localhost", "root", "", "alcolimetro");
$conn->set_charset("utf8");

if ($conn->connect_error){
    die("Conexion fallida".$conn->connect_error);
}
?>