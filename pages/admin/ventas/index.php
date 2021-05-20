<?php
include_once('../../layouts/head.php');
include_once('../../../db/db_utilidades.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
    header('Location: ../index.php');
    die();
}
$ventas = run_query_ventas();

?>

<!-- Content -->

<body class="d-flex h-100 bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center text-uppercase">Compras Realizadas</h4>
                    <hr>
                    <table class="table table-responsive table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>FECHA</th>
                                <th>SERIAL</th>
                                <th>PAGO</th>
                                <th>VALOR</th>
                                <th>CLIENTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $venta) : ?>
                                <tr>
                                    <td scope="row"><?php echo $venta['fecha_venta'] ?></td>
                                    <td scope="row"><a href="../celulares/editar?serial=<?php echo $venta['celulares_serial'] ?>"><?php echo $venta['celulares_serial'] ?></a></td>
                                    <td scope="row"><?php echo $venta['pago'] ?></td>
                                    <td scope="row"><?php echo $venta['valor'] ?></td>
                                    <td scope="row"><a href="../usuarios/editar?id=<?php echo $venta['usuarios_id'] ?>"><?php echo $venta['usuarios_id'] ?></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
                        <a href="../dashboard?>" type="button" class="btn btn-danger btn-sm">Volver</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>