<?php
include_once('pages/layouts/head.php')
?>

<!-- Content -->

<body class="d-flex h-100 text-center bg-dark">
	<div class="container">
		<div class="row vh-100 justify-content-center align-items-center">
			<!-- Tarjeta -->
			<div class="card text-center ">
				<img class="card-img-top" src="holder.js/100x180/" alt="">
				<div class="card-body">
					<h4 class="card-title text-uppercase">Venta de Celulares</h4>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="card h-100">
								<h5 class="card-header">Panel Usuario</h5><br>
								<img src=" assets/img/users.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Panel Usuario. Solo para usuarios con perfil de compra.</p>
									<a href="pages/usuarios/" class="btn btn-success col-12">Usuarios</a>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card h-100">
								<h5 class="card-header">Panel Administrativo</h5><br>
								<img src=" assets/img/admin.svg" width="100" height="100" class=" card-img-top" alt="...">
								<div class="card-body">
									<p class="card-text">Panel Administrador. Solo para usuarios con perfil administrador.</p>
									<a href="pages/admin" class="btn btn-danger col-12">Administradores</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>