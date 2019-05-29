<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['prodcuto']) && isset($_POST['cantidad']) && !empty($_POST['producto']) && !empty($_POST['cantidad'])) {
		$id_product = $_POST['producto'];
		$cantidad = $_POST['cantidad'];
		$id_user = $_SESSION['user']['id_user'];

        $pago = pago($id_product, $cantidad);

		$sql_insert = "INSERT INTO pedidos
		(id_user,id_product,cantidad,pago,)
		VALUES ('$id_user', '$id_product', '$cantdad',$pago)";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../cliente.php');
		}
	} else {
		redirect('../cliente.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../cliente.php');
}