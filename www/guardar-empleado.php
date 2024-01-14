<?

if (isset($_POST)) {

    require_once 'conexion.php';

    //mysqli_real_escape_string con esto lombiamos sin tener espacios : si no se cumple o vienw un parametro vacio este se llenaria como falso.
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conexion, $_POST['telefono']) : false;
    $direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conexion, $_POST['direccion']) : false;
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? mysqli_real_escape_string($conexion, $_POST['fecha_nacimiento']) : false;
    $observacion = isset($_POST['observacion']) ? mysqli_real_escape_string($conexion, $_POST['observacion']) : false;
    $sueldo = isset($_POST['sueldo']) ? mysqli_real_escape_string($conexion, $_POST['sueldo']) : false;

    $errores = array(); //en este se agregan los errores 

    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0.9]/", $nombre)) { // si no viene vacio y no es un numero y por medio de una exprecion regular si no viene un numero del 0 añl 9 
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido.";
    }

    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0.9]/", $apellido)) {
        $apellido_validado = true;
    } else {
        $apellido_validado = false;
        $errores['apellido'] = "El apellido no es valido.";
    }


    if (!empty($telefono) && is_numeric($telefono)) { // se le quita el ! ya que debe de ser un numero, igual la exprecion regular.
        $telefono_validado = true;
    } else {
        $telefono_validado = false;
        $errores['telefono'] = "El telefono no es valido.";
    }


    if (!empty($direccion) && !is_numeric($direccion)) {
        $direccion_validado = true;
    } else {
        $direccion_validado = false;
        $errores['direccion'] = "La direccion no es valida";

    }


    if (!empty($fecha_nacimiento)) {
        $fecha_nacimiento_validado = true;
    } else {
        $fecha_nacimiento_validado = false;
        $errores['fecha_nacimiento'] = "La fecha de nacimiento no es valida";
    }


    if (!empty($observacion)) {
        $observacion_validado = true;
    } else {
        $observacion_validado = false;
        $errores['observacion'] = "La observacion no es valida";
    }


    if (!empty($sueldo) && is_numeric($sueldo)) {
        $sueldo_validado = true;
    } else {

        $sueldo_validado = false;
        $errores['sueldo'] = "El sueldo no es valido";
    }


    if (count($errores) == 0) {
        $sql = "insert into empleado (nombre, apellido, telefono, direccion, fecha_nacimiento, observacion, sueldo) values ('$nombre','$apellido',$telefono,'$direccion','$fecha_nacimiento','$observacion','$sueldo')";
        // si el dato no es numeroco se deben colocar la comillas simples, caso contrario con telefono
        $guardar = mysqli_query($conexion, $sql); //esta es una fincion que necesita la sentencia sql y la coneccion 
        echo "Guardado con exito";
    } else {
        foreach ($errores as $val) {
            echo $val;
            echo "<br>";

        }
    }


}













































?>