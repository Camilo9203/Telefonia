<?php
include_once('../../layouts/head.php');
include_once('../../../db/db_utilidades.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
$usuarios = run_query_usuarios();

?>


<!-- Content -->

<body class="d-flex h-100 bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center text-uppercase">Usuarios Registrados</h4>
                    <hr>
                    <table class="table table-responsive table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>CEDULA</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>TELEFONO</th>
                                <th>DIRECCION</th>
                                <th>CORREO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td scope="row"><?php echo $usuario['id'] ?></td>
                                    <td scope="row"><?php echo $usuario['nombre'] ?></td>
                                    <td scope="row"><?php echo $usuario['apellido'] ?></td>
                                    <td scope="row"><?php echo $usuario['telefono'] ?></td>
                                    <td scope="row"><?php echo $usuario['direccion'] ?></td>
                                    <td scope="row"><?php echo $usuario['email'] ?></td>
                                    <td scope="row">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="eliminar.php?id=<?php echo $usuario['id'] ?>" type="button" class="btn btn-danger btn-sm">Eliminar</a>
                                            <a href="editar.php?id=<?php echo $usuario['id'] ?>" type="button" class="btn btn-warning btn-sm">Editar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
                        <a href="../dashboard.php" type="button" class="btn btn-danger btn-sm">Inicio</a>
                        <a href="registro.php" type="button" class="btn btn-success btn-sm">Crear Usuario</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>