<?

if (isset($_POST)) {

    require_once 'conexion.php';

    //mysqli_real_escape_string con esto lombiamos sin tener espacios : si no se cumple o vienw un parametro vacio este se llenaria como falso.
    $id_empleado = isset($_POST['id_empleado']) ? mysqli_real_escape_string($conexion, $_POST['id_empleado']) : false; // en caso de existir un emplesdo lo guarde en esa variable
    

    $errores = array(); //en este se agregan los errores 

    if (!empty($id_empleado) && is_numeric($id_empleado)) { // si no viene vacio y no es un numero
        $id_validado_validado = true;
    } else {
        $id_validado_validado = false;
        $errores['id_empleado'] = "El id_empleado no es valido.";
    }

   


    if (count($errores) == 0) {
        // se elimiminar una fila por el ID
        $sql = "delete from empleado where id_empleado = $id_empleado"; // cambiamos esa consulta
        // si el dato no es numeroco se deben colocar la comillas simples, caso contrario con telefono
        $guardar = mysqli_query($conexion, $sql); //esta es una fincion que necesita la sentencia sql y la coneccion 
        echo "Eliminado con exito";
    } else {
        foreach ($errores as $val) {
            echo $val;
            echo "<br>";

        }
    }


}

?>