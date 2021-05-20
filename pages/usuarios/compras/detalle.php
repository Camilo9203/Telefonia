<?php
include_once('../../layouts/head.php');
include_once('../../../db/db_utilidades.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['uid'])) {
    header('Location: ../index.php');
    die();
}

// Traer celular por id
$serial = isset($_GET['serial']) ? $_GET['serial'] : '';
$celular = traer_celulares_por_id($serial);
if ($_POST) {

    header('Location: index.php');

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    die();
}

?>


<body class="d-flex h-100 text-center bg-dark">

    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <!-- Tarjeta -->
            <div class="card text-center ">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title">Detalles del Celular</h4>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="../../../assets/celulares/<?php echo $celular['imagen'] ?>" alt="" width="300" height="300">
                        </div>
                        <!-- Formulario-->
                        <div class="col-lg-8">

                            <form action="" method="post" enctype="multipart/form-data">
                                <!--Serial -->
                                <div class="input-group p-2">
                                    <label class="input-group-text" for="serial">Serial</label>
                                    <input type="text" max="10" name="serial" id="serial" class="form-control text-uppercase" placeholder="Serial" required value="<?php echo $celular['serial'] ?>" disabled>
                                </div>
                                <!-- Marca -->
                                <div class="input-group p-2">
                                    <label class="input-group-text" for="marca">Marca</label>
                                    <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" required value="<?php echo $celular['marca'] ?>" disabled>
                                </div>
                                <!-- Modelo -->
                                <div class="input-group p-2">
                                    <label class="input-group-text" for="modelo">Modelo</label>
                                    <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" required value="<?php echo $celular['modelo'] ?>" disabled>
                                </div>

                                <!-- Precio -->
                                <div class="input-group p-2">
                                    <span class="input-group-text">$ Precio</span>
                                    <input type="number" name="precio" id="precio" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $celular['precio'] ?>" disabled>
                                </div>

                                <!-- Botones -->
                                <div class="btn-group col-12" role="group">
                                    <a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Atras</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>