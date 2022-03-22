<?php
include_once('../../layouts/head.php');
include_once('../../../db/db_utilidades.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
$celulares = run_query_celulares();

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
                    <h4 class="card-title text-center text-uppercase">Celulares Registrados</h4>
                    <hr>
                    <table class="table table-responsive table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>IMAGEN</th>
                                <th>SERIAL</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>PRECIO</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($celulares as $celular) : ?>
                                <tr>
                                    <td scope="row"><img src="../../../assets/celulares/<?php echo $celular['imagen'] ?>" alt="" width="150" height="150"></td>
                                    <td scope="row"><?php echo $celular['serial'] ?></td>
                                    <td scope="row"><?php echo $celular['marca'] ?></td>
                                    <td scope="row"><?php echo $celular['modelo'] ?></td>
                                    <td scope="row"><?php echo $celular['precio'] ?></td>
                                    <td scope="row"><?php echo $celular['estado'] ?></td>
                                    <td scope="row">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="eliminar.php?serial=<?php echo $celular['serial'] ?>" type="button" class="btn btn-danger btn-sm">Eliminar</a>
                                            <a href="editar.php?serial=<?php echo $celular['serial'] ?>" type="button" class="btn btn-warning btn-sm">Editar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
                        <a href="../dashboard.php" type="button" class="btn btn-danger btn-sm">Inicio</a>
                        <a href="registro.php" type="button" class="btn btn-success btn-sm">Registrar Celular</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>