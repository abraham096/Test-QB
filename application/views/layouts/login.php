<!-- TEMPLATE TOMADO DE https://colorlib.com/wp/template/login-form-09/-->

<link rel="stylesheet" href="css/styleLogin.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="css/styleLogin.css">

<div class="content">
	<div class="container">
		<div class="row justify-content-center">
			<!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
			<div class="col-md-6 contents">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="form-block">
							<div class="mb-4">
								<h3>Ingresar al Sistema de Control de Ventas <strong>SUPERMARKET</strong></h3>
								<p class="mb-4">SUPERMARKET |Su tienda OnLine</p>
							</div>
							<?= form_open(base_url() . 'login/', array('method' => 'post', 'class' => '')); ?>
							<div class="form-group first">
								<label for="username">Usuario</label>
								<input type="text" class="form-control" id="username" name="username">

							</div>

							<div>
								<p><br></p>
							</div>

							<div class="form-group last mb-4">
								<label for="password">Contraseña</label>
								<input type="password" class="form-control" id="password" name="password">

							</div>

							<div class="d-flex mb-5 align-items-center">
								<label class="control control--checkbox mb-0"><span class="caption">Recordarme</span>
									<input type="checkbox" checked="checked" />
									<div class="control__indicator"></div>
								</label>
							</div>

							<div class="d-flex mb-5 align-items-center">
								<span class="ml-auto"><a href="<?= base_url() . 'recuperarClave/' ?>" class="forgot-pass">¿Olvidó su contraseña?</a></span>
							</div>

							<input type="submit" value="Ingresar al Sistema" class="btn btn-pill text-white btn-block btn-primary">
							<?= form_close() ?>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mainLogin.js"></script>
</body>

</html>