<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['name']) && isset($_POST['role']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['con_pass']) && !empty($_POST['name']) && !empty($_POST['role'])  && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['con_pass'])) {
		$name = $_POST['name'];
		$role = $_POST['role'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$con_pass = $_POST['con_pass'];

		if($password==$con_pass){
			$sql_insert = "INSERT INTO user
			(name, role, username, password)
			VALUES ('$name','$role','$username', MD5('$password'))";

			echo $sql_insert;
			$conn->query($sql_insert);

			if ($conn->error) {
				echo 'Ocurrió un error ' . $conn->error;
			} else {
				redirect('../index.php');
			}
		}else{
			redirect('../registration.php?error_message=Las contraseñas no coinciden!');
		}

	} else {
		redirect('../registration.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../registration.php');
}
