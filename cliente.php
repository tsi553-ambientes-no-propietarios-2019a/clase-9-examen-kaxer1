<?php 
    include('common/utils.php');
    if($_GET) {
        if(isset($_GET['error_message'])) {
            $error_message = $_GET['error_message'];
        }
    }
    //$products = getProducts($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente</title>
</head>
<body>
    <div><a href="php/logout.php">Cerrar sesión</a></div>

    <h1>Bienvenido Cliente <?php echo $_SESSION['user']['username']; ?></h1>
    <h2>REGISTRAR PRODUCTO</h2>

    <?php if(isset($error_message)) { ?>
	<div><strong><?php echo $error_message; ?></strong></div>
<?php } ?>
	<form action="php/process_pedido.php" method="post">

		<div>
            <label>PRODUCTO: </label>
		    <select name="producto" required="required">
			<option value="">Seleccione...</option>
			<?php getSelectProduct($conn); ?>
            </select>
		</div>

		<div>
			<label>Cantidad</label>
			<input type="number" name="cantidad" required="required">
		</div>
		<div>
			<button>Registrar</button>
		</div>
	</form>
    
</body>
</html>