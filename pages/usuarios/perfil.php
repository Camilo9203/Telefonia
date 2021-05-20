<?php
include_once('../../db/db_utilidades.php');
include_once('../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['uid'])) {
    header('Location: ../index.php');
    die();
}

$id_usuario = $_SESSION['uid'];
if ($_POST) {

    header('Location: dashboard.php');

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $clave = isset($_POST['email']) ? $_POST['email'] : $_SESSION['clave'];

    actualizar_usuario($id, $nombre, $apellido, $telefono, $direccion, $email, $clave);
    die('Acceso denegado');
}
?>

<!-- Contenido -->

<body class="d-flex h-100 text-center bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card text-center ">
                <div class="card-body">
                    <h4 class="text-uppercase card-title">Actualizar Perfil</h4>
                    <hr>
                    <!-- Formulario-->
                    <form method="post">
                        <!--ID  -->
                        <div class="form-group p-2">
                            <input type="number" name="id" id="id" class="form-control" placeholder="Cedula" value="<?php echo $_SESSION['uid'] ?>" required disabled>
                        </div>
                        <!--Nombre  -->
                        <div class="form-group p-2">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" value="<?php echo $_SESSION['nombre'] ?>" required>
                        </div>
                        <!-- Apellido -->
                        <div class="form-group p-2">
                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" value="<?php echo $_SESSION['apellido'] ?>" required>
                        </div>
                        <!-- Telefono -->
                        <div class="form-group p-2">
                            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Numero de Celular" value="<?php echo $_SESSION['telefono'] ?>" required>
                        </div>
                        <!-- Direccion -->
                        <div class="form-group p-2">
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="<?php echo $_SESSION['direccion'] ?>" required>
                        </div>
                        <!-- Correo -->
                        <div class="form-group p-2">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo Eléctronico" value="<?php echo $_SESSION['email'] ?>" required>
                        </div>
                        <!-- Correo -->
                        <div class="form-group p-2">
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" value="<?php echo $_SESSION['clave'] ?>" required>
                        </div>
                        <!-- Botones -->
                        <div class="btn-group col-12" role="group">
                            <a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Atras</a>
                            <button type="submit" class="btn btn-success btn-sm">Actualizar Perfil</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>