<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<title>Implementar un carrito de compras</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Tipo de fuente -->
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,600,700&display=swap" rel="stylesheet" />
	<!-- Bootstrap Grid -->
	<link rel="stylesheet" href="css/bootstrap-grid.css" />
	<!-- Estilos CSS de personalización -->
	<link rel="stylesheet" href="css/estilosCC.css" />
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<h2>SUPERMARKET S.A de C.V.</h2>
			</div>
			<div class="col-sm-3">
				<!-- Carrito de compras y sus items -->
				<div class="carrito">
					<p class="carrito-total">
						<span class="simpleCart_quantity">0</span> item(s)
						<span class="simpleCart_total">$0.00</span>
					</p>

					<div class="bolsa">
						<div class="simpleCart_items"></div>
						<div class="opciones">
							<a class="boton simpleCart_empty" href="javascript:void(0)">Vaciar carrito</a>
							<a class="boton simpleCart_checkout" href="#">Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<?php
			foreach ($productos as $key) {
				$mu = "";
				$cont = 0;
				$nom = "";
				$des = "";
				$ruta = "";
				$stock = 0;
				$precio = 0;

				foreach ($key as $value) {
					switch ($variable) {
						case 1:
							$nom = $value;
							break;
						case 2:
							$precio = $value;
							break;
						case 3:
							$des = $value;
							break;
						case 4:
							$stock = $value;
							break;
						case 6:
							$mu = $value;
							break;
						case 8:
							$ruta = $value;
							break;
						default:
							break;
					}

					$cont++;
				}

				$fila = '
						<div class="col-md-6 col-lg-4 simpleCart_shelfItem">
							<h2 class="item_name">' . $nom . '</h2>
							<img class="item_image" src="' . $ruta . '" alt="' . $nom . '" />';

				$fila .= ($mu == 'U') ? '<input class="item_Quantity" type="number" min="1" max="' . $stock . '" value="1" step="1" />' : '<input class="item_Quantity" type="number" min="1" max="' . $stock . '" value="1" step="0.5" />';

				$fila .= '
							<div class="item_price">$' . $precio . '</div>
							<a class="item_add" href="javascript:;"> Añadir al carrito </a>
						</div>';
			}
			?>
		</div>
	</div>

	<footer class="container">
		<div class="row">
			<div class="col-sm">
				¡GRACIAS POR SU COMPRA!
			</div>
		</div>
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/simpleCart.min.js"></script>
	<script src="js/app.js"></script>
</body>

</html>
