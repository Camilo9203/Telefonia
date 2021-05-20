<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
$admin = traer_admin_por_id($id);
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}

if ($_POST) {

    header('Location: index.php');

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    actualizar_admin($id, $nombre, $apellido, $email, $clave);
    die();
}

?>

<body class="d-flex h-100 text-center bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card text-center ">
                <div class="card-body">
                    <h4 class="card-title">Actualizar Administrador</h4>
                    <!-- Formulario-->
                    <form action="" method="post">
                        <!--Nombre  -->
                        <div class="form-group p-2">
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $admin['nombre'] ?>" placeholder="Nombre" required>
                        </div>
                        <!-- Apellido -->
                        <div class="form-group p-2">
                            <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $admin['apellido'] ?>" placeholder="Apellido" required>
                        </div>
                        <!-- Correo -->
                        <div class="form-group p-2">
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $admin['email'] ?>" placeholder="Correo Electrónico" required>
                        </div>
                        <!-- Clave -->
                        <div class="form-group p-2">
                            <input type="password" name="clave" id="clave" class="form-control" value="<?php echo $admin['clave'] ?>" placeholder="Contraseña" required>
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