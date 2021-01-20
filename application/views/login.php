<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SUPERMARKET TEST- <?= $titulo; ?></title>
</head>
<?php
$op = $this->input->get('op', TRUE);

if (!empty($op)) {
	$login = '<div class="alert alert-danger"><strong>¡Datos Incorrectos!</strong> Verifique los datos ingresados.</div>';
	$session = '<div class="alert alert-danger"><strong>¡Sesión no iniciada!</strong> Inicie sesión con sus datos.</div>';

	$retVal = ($op == 'null') ? $login : $session;
	echo ($retVal);
}
?>

<body>
	<?= $body ?>
</body>

</html>
