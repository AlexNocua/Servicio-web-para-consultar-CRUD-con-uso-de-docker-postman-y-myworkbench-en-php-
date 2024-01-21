<?php
// coneccion con una base de datos
$conexion = mysqli_connect("mysql", "my_username", "my_password", "database_name", "3307");

if (mysqli_connect_errno()) {
    echo "la coneccion con la base de datos ha fallado:" . mysqli_connect_errno();

} else {
    echo "La coneccion con la base de datos fue correcta";
}

//consulta para configurar la cogificacion de caracteres

mysqli_query($conexion, "SET NAMES 'utf8'" )
?>