<?php 
session_start();


$conn = new mysqli('localhost', 'root', '', 'examenb1');

if($conn->connect_error) {
	echo 'Existió un error en la conexión ' . $conn->connect_error;
	exit;
}

function redirect($url) {
	header('Location: ' . $url);
	exit;
}

function getProducts($conn) {
	$user_id = $_SESSION['user']['id_user'];
	$sql = "SELECT *
		FROM product
		WHERE id_user='$user_id'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$products = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$products[] = $row;
			}
		}

		return $products;
}

function getSelectProduct($conn){
	$sql_select = "SELECT name
		FROM product";
	
	$result = mysqli_query($conn,$sql_select);

	if ($conn->error) {
		redirect('../cliente.php?error_message=Ocurrió un error: ' . $conn->error);
	}

	while($mostrar = mysqli_fetch_array($result)){
		echo '<option value="'.$mostrar['id_product'].'">'.$mostrar['name'].'</option>';	
	}
echo '<br>';
}



/*
//Esta funcion enlista las tiendas con el la URL y el ID de su respectiva tienda
function getUser($conn){
	$user_id = $_SESSION['user']['id'];
	$sql_select = "SELECT *
		FROM user
		WHERE NOT id='$user_id'";

		$result = mysqli_query($conn,$sql_select);

		if ($conn->error) {
			redirect('/clase-8-tiendas-kaxer1/tiendas/home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

    while($mostrar = mysqli_fetch_array($result)){
		$num = $mostrar['id'];
        echo '<ul>';
        echo '<li>'."<a href="."/clase-8-tiendas-kaxer1/tiendas/store.php?id=$num>".$mostrar['store']."</a>".'</li>';
        echo '</ul>';
    }
	echo '<br>';

}

//Esta funcion obtine los productos de la tienda seleccionada 
function getProductsNew($conn, $id_stock) {
	$sql = "SELECT *
		FROM product
		WHERE user='$id_stock'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$products = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$products[] = $row;
			}
		}

		return $products;
}

*/

/*
$public_pages = [
	'/clase-9-examen-kaxer1/index.php', 
	'/clase-9-examen-kaxer1/php/process_login.php',
	'/clase-9-examen-kaxer1/registration.php',
	'/clase-9-examen-kaxer1/php/process_registration.php'
];

if ( !isset($_SESSION['user']) && !in_array( $_SERVER['SCRIPT_NAME'], $public_pages)) {
	redirect($_SERVER["HTTP_HOST"] . '/clase-9-examen-kaxer1/index.php');
} elseif( 
	isset($_SESSION['user']) && (
	$_SERVER['SCRIPT_NAME'] == '/clase-9-examen-kaxer1/index.php' || 
	$_SERVER['SCRIPT_NAME'] == '/clase-9-examen-kaxer1/registration.php')) {
	redirect($_SERVER["HTTP_HOST"] . '/clase-9-examen-kaxer1/home.php');
}
*/
