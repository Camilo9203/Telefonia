<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['uid'])) {
    header('Location: ../index.php');
    die();
}
// Traer Celular
$serial = isset($_GET['serial']) ? $_GET['serial'] : '';
$celular = traer_celulares_por_id($serial);
// Variable fecha actual
$fecha_venta = date('Y-m-d');
// Si variable POST existe
if ($_POST) {

    //header('Location: realizadas.php');
    $pago = isset($_POST['pago']) ? $_POST['pago'] : '';
    $valor = $celular['precio'];
    $usuario_id = $_SESSION['uid'];
    $celulares_serial = $celular['serial'];
    $id = $celular['serial'];
    //Funcion comprar
    comprar($fecha_venta, $pago, $valor, $usuario_id, $celulares_serial, $id);

    die();
}

?>
<!-- Contenido -->

<body class="d-flex h-100 text-center bg-dark">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card text-center ">
                <div class="card-body">
                    <h4 class="card-title">Comprar Celular <?php echo $celular['marca'] . ' ' . $celular['modelo'] ?></h4>
                    <hr>
                    <!-- Formulario-->
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="../../../assets/celulares/<?php echo $celular['imagen'] ?>" alt="" width="300" height="300">
                        </div>
                        <div class="col-lg-8">
                            <form method="post">
                                <div class="input-group p-2">
                                    <label class="input-group-text" for="marca">Medio de pago</label>
                                    <input class="form-control" type="data" value="<?php echo $fecha_venta ?>" id="fecha" name="fecha">
                                </div>
                                <!-- Valor -->
                                <div class="input-group p-2">
                                    <span class="input-group-text">$ Costo</span>
                                    <input type="number" name="varlo" id="valor" class="form-control" value="<?php echo $celular['precio']; ?>" disabled>
                                </div>
                                <!-- Marca -->
                                <div class="input-group p-2">
                                    <label class="input-group-text" for="pago">Medio de pago</label>
                                    <select class="form-select" name="pago" id="pago" required>
                                        <option selected value="">Elige una marca</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta de credito">Tarjeta de credito</option>
                                        <option value="Pagos PSE">Pagos PSE</option>
                                        <option value="MercaPago">MercaPago</option>
                                        <option value="Codensa">Codensa</option>
                                    </select>
                                </div><br>
                                <!-- Botones -->
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Cancelar</a>
                                    <button type="submit" class="btn btn-success btn-sm">Comprar Celular</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>