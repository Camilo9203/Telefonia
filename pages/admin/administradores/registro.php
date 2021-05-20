<?php
include_once('../../../db/db_utilidades.php');
include_once('../../layouts/head.php');
//Debe estar autenticado para continuar
// if (!isset($_SESSION['aid'])) {
// 	header('Location: ../index.php');
// 	die();
// }
if ($_POST) {

	// header('Location: index.php');

	if ($_POST['clave'] == $_POST['clave2']) {
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
		$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$clave = isset($_POST['clave']) ? $_POST['clave'] : '';
		crear_admin($nombre, $apellido, $email, $clave);
		die();
	} else {
		echo 'Contraseñas no coinciden';
		//TODO: Completar condigo para solicitud doble contraseña y archivos viejos post
	}
}
?>

<body class="d-flex h-100 text-center bg-dark">
	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">

			<!-- Tarjeta -->
			<div class="card text-center ">
				<img class="card-img-top" src="holder.js/100x180/" alt="">
				<div class="card-body">
					<h4 class="card-title">Registrar Admnistrador</h4>
					<!-- Formulario-->
					<form action="" method="post">
						<!--Nombre  -->
						<div class="form-group p-2">
							<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required>
						</div>
						<!-- Apellido -->
						<div class="form-group p-2">
							<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" required>
						</div>
						<!-- Correo -->
						<div class="form-group p-2">
							<input type="email" name="email" id="email" class="form-control" placeholder="Correo Eléctronico" required>
						</div>
						<!-- Clave -->
						<div class="form-group p-2">
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Ingresa Clave" required>
						</div><!-- Clave -->
						<div class="form-group p-2">
							<input type="password" name="clave2" id="clave2" class="form-control" placeholder="Repetir Clave" required>
						</div>
						<!-- Botones -->
						<div class="btn-group col-12" role="group" aria-label="Basic mixed styles example">
							<a href="<?= $_SERVER["HTTP_REFERER"] ?>" type="button" class="btn btn-danger btn-sm">Atras</a>
							<button type="submit" class="btn btn-success btn-sm">Registrar Administrador</button>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>
</body>

</html>