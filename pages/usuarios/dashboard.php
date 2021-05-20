<?php
include_once('../layouts/head.php');
//Debe estar autenticado para continuar
if (!isset($_SESSION['uid'])) {
	header('Location: ../index.php');
	die();
}
?>

<body class="d-flex h-100 text-center bg-dark">
	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">
			<!-- Tarjeta -->
			<div class="card text-center ">
				<div class="card-body">
					<h4 class="card-title">Panel Usuario</h4>
					<h5>Bienvenido <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></h5>
					<hr>
					<div class="row">
						<!-- Celulares -->
						<div class="col-sm-12 col-lg-4">
							<div class="card h-100">
								<h5 class="card-header">Comprar celular</h5><br>
								<img src="../../assets/img/mobile.svg" width="10" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Ver celulares disponibles</p>
									<a href="compras" class="btn btn-success col-12">Comprar</a>
								</div>
							</div>
						</div>
						<!-- Ventas -->
						<div class="col-sm-12 col-lg-4">
							<div class="card h-100">
								<h5 class="card-header">Compras realizadas</h5><br>
								<img src="../../assets/img/cart.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Ver detalles de compras realizadas</p>
									<a href="compras/realizadas" class="btn btn-warning col-12">Compras</a>
								</div>
							</div>
						</div>
						<!-- Administradores -->
						<div class="col-sm-12 col-lg-4">
							<div class="card h-100">
								<h5 class="card-header">Perfil</h5><br>
								<img src="../../assets/img/admin.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Editar tu perfil</p>
									<a href="perfil" class="btn btn-info col-12">Perfil</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a class="btn btn-danger btn-sm" href="logout" role="button">Finalizar sesión</a>
			</div>

		</div>
	</div>
</body>

</html>