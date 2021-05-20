<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
if ($_POST) {

    // header('Location: index.php');
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

    crear_usuario($id, $nombre, $apellido, $telefono, $direccion, $email, $clave);
    die('Acceso denegado');
}
?>

<body class="d-flex h-100 text-center bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card text-center ">
                <div class="card-body">
                    <h4 class="text-uppercase card-title">Registrar Usuario</h4>
                    <hr>
                    <!-- Formulario-->
                    <form method="post">
                        <!--ID  -->
                        <div class="form-group p-2">
                            <input type="number" name="id" id="id" class="form-control" placeholder="Cedula" required>
                        </div>
                        <!--Nombre  -->
                        <div class="form-group p-2">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required>
                        </div>
                        <!-- Apellido -->
                        <div class="form-group p-2">
                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required>
                        </div>
                        <!-- Telefono -->
                        <div class="form-group p-2">
                            <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Numero de Celular" required>
                        </div>
                        <!-- Direccion -->
                        <div class="form-group p-2">
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
                        </div>
                        <!-- Correo -->
                        <div class="form-group p-2">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo Eléctronico" required>
                        </div>
                        <!-- Clave -->
                        <div class="form-group p-2">
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Ingresa Clave" required>
                        </div>
                        <!-- Botones -->
                        <div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
                            <a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Atras</a>
                            <button type="submit" class="btn btn-success btn-sm">Registrar Usuario</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>