<?php
include_once('../../layouts/head.php');
include_once('../../../db/db_utilidades.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$usuario = traer_usuario_por_id($id);
if ($_POST) {

    header('Location: index.php');
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

    actualizar_usuario($id, $nombre, $apellido, $telefono, $direccion, $email, $clave);
    die('Acceso denegado');
}

?>


<body class="d-flex h-100 text-center bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card text-center ">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">Actualizar Usuario</h4>
                    <!-- Formulario-->
                    <form method="post">
                        <!--Cedula  -->
                        <div class="form-group p-2">
                            <input type="number" name="id" id="id" class="form-control" value="<?php echo $usuario['id'] ?>" placeholder="Cedula" required>
                        </div>
                        <!--Nombre  -->
                        <div class="form-group p-2">
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $usuario['nombre'] ?>" placeholder="Nombre" required>
                        </div>
                        <!-- Apellido -->
                        <div class="form-group p-2">
                            <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $usuario['apellido'] ?>" placeholder="Apellido" required>
                        </div>
                        <!-- Telefono -->
                        <div class="form-group p-2">
                            <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $usuario['telefono'] ?>" placeholder="Celular" required>
                        </div>
                        <!-- Direccion -->
                        <div class="form-group p-2">
                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $usuario['direccion'] ?>" placeholder="Dirección" required>
                        </div>
                        <!-- Correo -->
                        <div class="form-group p-2">
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $usuario['email'] ?>" placeholder="Correo Electrónico" required>
                        </div>
                        <!-- Clave -->
                        <div class="form-group p-2">
                            <input type="password" name="clave" id="clave" class="form-control" value="<?php echo $usuario['clave'] ?>" placeholder="Contraseña" required>
                        </div>
                        <!-- Botones -->
                        <div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
                            <a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Atras</a>
                            <button type="submit" class="btn btn-success btn-sm">Actualizar Usuario</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>