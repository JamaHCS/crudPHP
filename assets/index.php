<?php
include_once('./php/connection.php');

$nombre = "";
$descripcion = "";
$precio = "";

if (!empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}

if (!empty($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion'];
}

if (!empty($_POST['precio'])) {
    $precio = $_POST['precio'];
}

$insert_producto = "INSERT INTO producto(name, description, price) VALUES('$nombre', '$descripcion', '$precio')";
if ($conection->query($insert_producto) === true) {
    echo "Se inserto el producto a la base datos";
} else {
    echo $insert_producto;
}


?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>crud</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<form action="index.php" method="post" class="needs-validation" novalidate>

				<div class="row form-group">


					<div class="col-md-4">
						<label for="nombre">Nombre</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<label for="nombre" class="input-group-text">
									<img src="./iconos/person-fill.svg" alt="">
								</label>
							</div>
							<input class="form-control" type="text" id="nombre" name="nombre" value=""
								placeholder="Nombre producto">
						</div>
					</div>

					<div class="col-md-4">
						<label for="descripcion">Descripción</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<label for="descripcion" class="input-group-text">
									<img src="./iconos/person-fill.svg" alt="">
								</label>
							</div>
							<input class="form-control" type="text" id="descripcion" name="descripcion" value=""
								placeholder="Descripción">
						</div>
					</div>

					<div class="col-md-4">
						<label for="precio">Precio</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<label for="precio" class="input-group-text">
									<img src="./iconos/person-fill.svg" alt="">
								</label>
							</div>
							<input class="form-control" type="number" id="precio" name="precio" value=""
								placeholder="$0.00">
						</div>
					</div>

					<div>
						<table>
							<tr>
								<td>ID</td>
								<td>Nombre</td>
								<td>Descripción</td>
								<td>Precio</td>
							</tr>
							<?php
                
            ?>
						</table>
					</div>

				</div>



			</form>

		</div>
	</div>
</body>

</html>