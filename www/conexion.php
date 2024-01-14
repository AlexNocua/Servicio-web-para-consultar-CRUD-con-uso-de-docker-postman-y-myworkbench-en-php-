<?php
// conexión con una base de datos
$conexion = mysqli_connect("mysql", "my_username", "my_password", "database_name", "3306");

// ver si la conexión está correcta
if (!$conexion) {
    die("La conexión con la base de datos ha fallado: " . mysqli_connect_error());
} else {
    echo "La conexión con la base de datos fue correcta <br>"; 
}

// consulta para configurar la codificación de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");
?>
