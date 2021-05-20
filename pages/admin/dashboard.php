<?php
include_once('../layouts/head.php');
if (!isset($_SESSION['aid'])) {
	header('Location: index.php');
	die();
}

?>

<body class="d-flex h-100 text-center bg-dark">
	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">
			<!-- Tarjeta -->
			<div class="card text-center ">
				<div class="card-body">
					<h4 class="card-title">Panel Admin</h4>
					<h5>Bienvenido <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></h5>
					<hr>
					<div class="row">
						<!-- Ventas -->
						<div class="col-sm-12 col-md-6 col-lg-3">
							<div class="card h-100">
								<h5 class="card-header">Ventas Realizadas</h5><br>
								<img src="../../assets/img/cart.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Ver detalles de ventas registradas</p>
									<a href="../admin/ventas/" class="btn btn-success col-12">Ventas</a>
								</div>
							</div>
						</div>
						<!-- Celulares -->
						<div class="col-sm-12 col-md-6 col-lg-3">
							<div class="card h-100">
								<h5 class="card-header">Celulares registrados</h5><br>
								<img src="../../assets/img/mobile.svg" width="10" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Administrar. Celulares registrados</p>
									<a href="../admin/celulares/" class="btn btn-warning col-12">Celulares</a>
								</div>
							</div>
						</div>
						<!-- Usuarios -->
						<div class="col-sm-12 col-md-6 col-lg-3">
							<div class="card h-100">
								<h5 class="card-header">Usuarios Registrados</h5><br>
								<img src="../../assets/img/users.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Administrar usuarios registrados</p>
									<a href="../admin/usuarios" class="btn btn-info col-12">Usuarios</a>
								</div>
							</div>
						</div>
						<!-- Administradores -->
						<div class="col-sm-12 col-md-6 col-lg-3">
							<div class="card h-100">
								<h5 class="card-header">Administradores</h5><br>
								<img src="../../assets/img/admin.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Administrar. Celulares registrados</p>
									<a href="../admin/administradores/" class="btn btn-dark col-12">Ingresar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a class="btn btn-danger btn-sm col-12" href="logout" role="button">Finalizar sesión</a>
			</div>
		</div>
	</div>
</body>

</html>