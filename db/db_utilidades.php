<?php
// Funcion para depurar
function debug($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}
// Credenciales MYSQL
require_once('db_credenciales.php');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
//Error de conexion
if ($mysqli->connect_errno) {
    echo 'Error en la conexión';
    exit;
}
// Funciones CRUD Tabla Usuarios
//Login 
function get_usuario_by_email($email)
{
    global $mysqli;
    $sql = "SELECT * FROM usuarios WHERE email = '{$email}'";
    $usuario = $mysqli->query($sql);
    return $usuario->fetch_assoc();
}
// Create
function crear_usuario($id, $nombre, $apellido, $telefono, $direccion, $email, $clave)
{
    global $mysqli;
    $clave = password_hash($clave, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `usuarios`(`id`, `nombre`, `apellido`, `telefono`, `direccion`, `email`, `clave`) VALUES ('$id','$nombre','$apellido','$telefono','$direccion','$email','$clave')";
    $insertar = $mysqli->query($sql) or die($mysqli->error);
    if (!isset($insertar)) {
        echo "Error al ingresar datos";
    } else {
        $msg = 'Administrador registrado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}
// Read
function run_query_usuarios()
{
    global $mysqli;
    $sql = 'SELECT * FROM usuarios';
    return $mysqli->query($sql);
}

// Update
function traer_usuario_por_id($id)
{
    global $mysqli;
    $sql = "SELECT * FROM usuarios WHERE id = '{$id}'";
    $usuario = $mysqli->query($sql);
    if ($usuario->num_rows)
        return $usuario->fetch_assoc();
    return false;
}
function actualizar_usuario($id, $nombre, $apellido, $telefono, $direccion, $email, $clave)
{
    global $mysqli;
    $sql = "UPDATE usuarios SET id = '{$id}', 'nombre = '{$nombre}', apellido = '{$apellido}', telefono = '{$telefono}', direccion = '{$direccion}', email = '{$email}', clave '{$clave}' WHERE id = {$id}";
    $mysqli->query($sql) or die($mysqli->error);
}

// Delete
function borrar_usuario($id)
{
    global $mysqli;
    $sql = "DELETE FROM usuarios WHERE id = {$id}";
    $mysqli->query($sql);
}


// Funciones CRUD Tabla Administradores
// Login
function get_administrador_by_email($email)
{
    global $mysqli;
    $sql = "SELECT * FROM administradores WHERE email = '{$email}'";
    $administrador = $mysqli->query($sql);
    return $administrador->fetch_assoc();
}
// Create
function crear_admin($nombre, $apellido, $email, $clave)
{
    global $mysqli;
    //Encriptar contraseña
    $clave = password_hash($clave, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `administradores`(`nombre`, `apellido`, `email`, `clave`) VALUES ('$nombre','$apellido','$email','$clave')";
    $insertar = $mysqli->query($sql) or die($mysqli->error);

    if (!isset($insertar)) {
        echo "Error al ingresar datos";
    } else {
        $msg = 'Administrador registrado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}
// Read
function run_query_administradores()
{
    global $mysqli;
    $sql = 'SELECT * FROM administradores';
    return $mysqli->query($sql);
}
// Update
function traer_admin_por_id($id)
{
    global $mysqli;
    $sql = "SELECT * FROM administradores WHERE id = '{$id}'";
    $admin = $mysqli->query($sql);
    if ($admin->num_rows)
        return $admin->fetch_assoc();
    return false;
}
function actualizar_admin($id, $nombre, $apellido, $email, $clave)
{
    global $mysqli;
    $sql = "UPDATE administradores SET nombre = '{$nombre}', apellido = '{$apellido}', email = '{$email}', clave = '{$clave}' WHERE id = {$id}";
    $mysqli->query($sql);
    if ($mysqli->error) {
        echo  'Error ' . $mysqli->error;
    } else {
        $msg = 'Administrador actualizado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}
// Delete
function borrar_administradores($id)
{
    global $mysqli;
    $sql = "DELETE FROM administradores WHERE id = {$id}";
    $mysqli->query($sql);
    if ($mysqli->error) {
        echo  'Error ' . $mysqli->error;
    } else {
        $msg = 'Administrador borrado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}


//CRUD Celulares
//Create
function crear_celulares($serial, $marca, $modelo, $precio, $estado, $imagen, $administradores_id)

{
    global $mysqli;
    $sql = "INSERT INTO `celulares`(`serial`, `marca`, `modelo`, `precio`, `estado`, `imagen`, `administradores_id`) VALUES ('$serial','$marca','$modelo','$precio','$estado', '$imagen', '$administradores_id')";
    $insertar = $mysqli->query($sql) or die($mysqli->error);
    if ($mysqli->error) {
        echo  'Error ' . $mysqli->error;
    } else {
        $msg = 'Celular registrado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}
// Read
function run_query_celulares()
{
    global $mysqli;
    $sql = 'SELECT * FROM celulares';
    return $mysqli->query($sql);
}
// Update
function traer_celulares_por_id($serial)
{
    global $mysqli;
    $sql = "SELECT * FROM celulares WHERE serial = '{$serial}'";
    $celular = $mysqli->query($sql);
    if ($celular->num_rows)
        return $celular->fetch_assoc();
    return false;
}
function actualizar_celular($id, $serial, $marca, $modelo, $precio, $estado, $imagen)
{
    global $mysqli;
    $sql = "UPDATE celulares SET serial = '{$serial}', marca = '{$marca}', modelo = '{$modelo}', precio = '{$precio}', estado = '{$estado}', imagen = '{$imagen}' WHERE id = {$id}";
    $mysqli->query($sql);
    if ($mysqli->error) {
        echo  'Error ' . $mysqli->error;
    } else {
        $msg = 'Celular borrado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}
// Delete
function borrar_celular($serial)
{
    global $mysqli;
    $sql = "DELETE FROM celulares WHERE serial = '{$serial}'";
    $mysqli->query($sql);
    if ($mysqli->error) {
        echo  'Error ' . $mysqli->error;
    } else {
        $msg = 'Celular borrado con exito!';
        header('Location: index.php?msg=' . $msg);
    }
}

//CRUD COMPRAR!!
// Traer celulares disponibles
function run_query_ventas()
{
    global $mysqli;
    $sql = 'SELECT * FROM ventas';
    return $mysqli->query($sql);
}
function run_query_celulares_disponibles()
{
    global $mysqli;
    $sql = "SELECT * FROM celulares WHERE estado = 'Disponible' ";
    return $mysqli->query($sql);
}
// Trear solo celulares comprados por un usuario
function celulares_comprados($usuario_id)
{
    global $mysqli;
    $sql = "SELECT * FROM ventas WHERE usuarios_id = '{$usuario_id}'";
    return $mysqli->query($sql);
}
// Registrar compra
function comprar($fecha_venta, $pago, $valor, $usuario_id, $celular_serial, $id)
{
    global $mysqli;
    $sql = "INSERT INTO `ventas` (`fecha_venta`, `pago`, `valor`, `usuarios_id`, `celulares_serial`) VALUES ('$fecha_venta', '$pago', '$valor', '$usuario_id', '$celular_serial')";
    $update = "UPDATE celulares SET estado = 'Vendido' WHERE serial = '{$id}'";
    $actualizar = $mysqli->query($update) or die($mysqli->error);
    $insertar = $mysqli->query($sql) or die($mysqli->error);

    if (!isset($actualizar)) {
        echo  'Error ' . $mysqli->error;
    } else {
        $msg = 'Celular registrado con exito!';
        header('Location: index?msg=' . $msg);
    }
}
function actualizar_estado_celular($id)
{
    global $mysqli;
    $sql = "UPDATE celulares SET estado = 'Vendido' WHERE serial = {$id}";
    $mysqli->query($sql);
}
