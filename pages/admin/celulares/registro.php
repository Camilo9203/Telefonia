<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['aid'])) {
	header('Location: ../index.php');
	die();
}
//Declaración Variables
$subir = false;
$subir_error = false;
$msg = '';
$msg_error = '';

// Subir Archivo
if ($_FILES) {
	$directorio = '../../../assets/celulares/';
	$copiar_imagen = $directorio . basename($_FILES['imagen']['name']);

	$tipo_imagen = pathinfo($copiar_imagen, PATHINFO_EXTENSION);

	if ($tipo_imagen == 'jpg' or $tipo_imagen == 'png' or $tipo_imagen == 'jpeg' or $tipo_imagen == 'svg') {
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $copiar_imagen)) {
			$subir = true;
			$msg = 'El fichero fue cargado correctamente';
			if ($_POST) {

				$serial = isset($_POST['serial']) ? $_POST['serial'] : '';
				$marca = isset($_POST['marca']) ? $_POST['marca'] : '';
				$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
				$precio = isset($_POST['precio']) ? $_POST['precio'] : '';
				$estado = 'Disponible';
				$imagen = basename($_FILES['imagen']['name']);
				$administradores_id = $_SESSION['aid'];

				crear_celulares($serial, $marca, $modelo, $precio, $estado, $imagen, $administradores_id);
				die();
			}
		} else {
			$subir = false;
			$subir_error = true;
			$msg_error = 'Error al cargar archivo';
		}
	} else {
		$subir = false;
		$subir_error = true;
		$msg_error = 'Tipo de archivo no permitido';
	}
}

?>

<body class="d-flex h-100 text-center bg-dark">

	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">
			<!-- Alertas-->
			<?php include_once('../../layouts/alertas.php'); ?>
			<!-- Tarjeta -->
			<div class="card text-center ">
				<img class="card-img-top" src="holder.js/100x180/" alt="">
				<div class="card-body">
					<h4 class="card-title">Registrar Celular</h4>
					<hr>
					<!-- Formulario-->
					<form action="" method="post" enctype="multipart/form-data">
						<!--Serial -->
						<div class="input-group p-2">
							<label class="input-group-text" for="serial">Serial</label>
							<input type="text" max="10" name="serial" id="serial" class="form-control text-uppercase" placeholder="Serial" required value="<?php echo isset($_POST['serial']) ? $_POST['serial'] : ''; ?>">
						</div>

						<!-- Marca -->
						<div class="input-group p-2">
							<label class="input-group-text" for="marca">Marca</label>
							<select class="form-select" name="marca" id="marca">
								<option selected value="<?php echo isset($_POST['marca']) ? $_POST['marca'] : ''; ?>"><?php echo isset($_POST['marca']) ? $_POST['marca'] : 'Elige una marca'; ?></option>
								<option value="Motorola">Motorola</option>
								<option value="Huawei">Huawei</option>
								<option value="Samsumg">Samsumg</option>
								<option value="Alcatel">Alcatel</option>
								<option value="Xiaomi">Xiaomi</option>
								<option value="Iphone">iPhone</option>
							</select>
						</div>
						<!-- Modelo -->
						<div class="input-group p-2">
							<label class="input-group-text" for="modelo">Modelo</label>
							<input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" required value="<?php echo isset($_POST['modelo']) ? $_POST['modelo'] : ''; ?>">
						</div>

						<!-- Precio -->
						<div class="input-group p-2">
							<span class="input-group-text">$ Precio</span>
							<input type="number" name="precio" id="precio" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo isset($_POST['precio']) ? $_POST['precio'] : ''; ?>">
						</div>
						<!-- Imagen -->
						<div class="input-group p-2">
							<label class="input-group-text" for="imagen">Imagen</label>
							<input type="file" class="form-control" name="imagen" id="imagen" required>
						</div>
						<!-- Botones -->
						<div class="btn-group col-12" role="group">
							<a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Atras</a>
							<button type="submit" class="btn btn-success btn-sm">Registrar Celular</button>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>
</body>

</html>