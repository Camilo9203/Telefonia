<?php
include_once('../layouts/head.php');
include_once('../../db/db_utilidades.php');

if ($_POST) {

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$clave = isset($_POST['clave']) ? $_POST['clave'] : '';

	$datos_administrador = get_administrador_by_email($email);

	if (password_verify($clave, $datos_administrador['clave'])) {
		$_SESSION['aid'] = $datos_administrador['id'];
		$_SESSION['nombre'] = $datos_administrador['nombre'];
		$_SESSION['apellido'] = $datos_administrador['apellido'];
		$_SESSION['email'] = $datos_administrador['email'];
		header('Location: dashboard.php ');
		die();
	} else {
		die('Datos Incorrectos');
	}
}

?>

<body class="d-flex h-100 text-center bg-dark">
	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">
			<!-- Tarjeta -->
			<div class="card text-center" style="width: 30rem;">
				<div class="card-body">
					<h4 class="card-title text-uppercase">Administrador</h4>
					<hr>
					<!-- Formulario-->
					<form method="post">
						<!-- Correo -->
						<div class="form-group p-2">
							<input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" required>
						</div>
						<!-- Clave -->
						<div class="form-group p-2">
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required>
						</div><br>
						<!-- Botones -->
						<div class="btn-group col-12" role="group">
							<a href="../../" type="button" class="btn btn-danger btn-sm">Atras</a>
							<button type="submit" class="btn btn-success btn-sm">Ingresar</button>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</body>

</html>