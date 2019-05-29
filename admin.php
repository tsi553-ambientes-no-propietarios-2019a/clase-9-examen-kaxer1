<?php 
    include('common/utils.php');
    if($_GET) {
        if(isset($_GET['error_message'])) {
            $error_message = $_GET['error_message'];
        }
    }
    $products = getProducts($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
</head>
<body>
	<div><a href="php/logout.php">Cerrar sesión</a></div>
    <h1>Bienvenido Administrador <?php echo $_SESSION['user']['username']; ?></h1>
    <h2>REGISTRAR PRODUCTO</h2>

    <?php if(isset($error_message)) { ?>
	<div><strong><?php echo $error_message; ?></strong></div>
<?php } ?>
	<form action="php/process_newProduct.php" method="post">

		<div>
			<label>Nombre</label>
			<input type="text" name="name" required="required">
		</div>

		<div>
			<label>Precio</label>
			<input type="number" name="price" required="required">
		</div>
		<div>
			<button>Registrar</button>
		</div>
	</form>

    <h2>lista de productos</h2>

    <table>
		<thead>
			<tr>
				<th>Producto</th>
				<th>Precio</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($products as $p) { ?>
				<tr>
					<td><?php echo $p['name'] ?></td>
					<td><?php echo $p['price'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


</body>
</html>