<?php
include_once('../../layouts/head.php');
include_once('../../../db/db_utilidades.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
$administradores = run_query_administradores();

?>

<!-- Content -->

<body class="d-flex h-100 bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Alertas -->
            <?php if (isset($_GET['msg'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_GET['msg'] ?>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <!-- Tarjeta -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center text-uppercase">Administradores Registrados</h4>
                    <hr>
                    <table class="table table-responsive table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>CORREO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($administradores as $admin) : ?>
                                <tr>
                                    <td scope="row"><?php echo $admin['nombre'] ?></td>
                                    <td scope="row"><?php echo $admin['apellido'] ?></td>
                                    <td scope="row"><?php echo $admin['email'] ?></td>
                                    <td scope="row">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="eliminar.php?id=<?php echo $admin['id']; ?>" type="button" class="btn btn-danger btn-sm">Eliminar</a>
                                            <a href="editar.php?id=<?php echo $admin['id'] ?>" type="button" class="btn btn-warning btn-sm">Editar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
                        <a href="../dashboard.php" type="button" class="btn btn-danger btn-sm">Inicio</a>
                        <a href="registro.php" type="button" class="btn btn-success btn-sm">Crear administrador</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>