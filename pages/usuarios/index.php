<?php
include_once('../layouts/head.php');
include_once('../../db/db_utilidades.php');

if ($_POST) {

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$clave = isset($_POST['clave']) ? $_POST['clave'] : '';

	$datos_usuarios = get_usuario_by_email($email);

	if (password_verify($clave, $datos_usuarios['clave'])) {
		$_SESSION['uid'] = $datos_usuarios['id'];
		$_SESSION['nombre'] = $datos_usuarios['nombre'];
		$_SESSION['apellido'] = $datos_usuarios['apellido'];
		$_SESSION['telefono'] = $datos_usuarios['telefono'];
		$_SESSION['direccion'] = $datos_usuarios['direccion'];
		$_SESSION['email'] = $datos_usuarios['email'];
		$_SESSION['clave'] = $datos_usuarios['clave'];
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
			<div class="card" style="width: 30rem;">
				<img class=" card-img-top" src="holder.js/100x180/" alt="">
				<div class="card-body">
					<h4 class="card-title text-uppercase">Usuario</h4>
					<hr>
					<!-- Formulario-->
					<form method="post">
						<!-- Correo -->
						<div class="form-group p-2">
							<input type="email" name="email" id="email" class="form-control" placeholder="Correo Eléctronico" required>
						</div>
						<!-- Clave -->
						<div class="form-group p-2">
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Ingresa Clave" required>
						</div><br>
						<!-- Botones -->
						<div class="btn-group col-12" role="group">
							<a href="../../" type="button" class="btn btn-danger btn-sm">Cancelar</a>
							<button type="submit" class="btn btn-success btn-sm">Ingresar</button>
							<a href="registro.php" class="btn btn-info btn-sm">Registrarse</a>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>


	<!-- JS Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>