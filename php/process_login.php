<?php 
include('../common/utils.php');
if($_POST) {
	if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT *
		FROM user
		WHERE username='$username'
		AND password=MD5('$password')";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../index.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		if($res->num_rows > 0) {
				while ($row = $res->fetch_assoc()) {
					$_SESSION['user'] = [
						'role' => $row['role'],
						'username' => $row['username'],
						'id_user' => $row['id_user']
					];
					
					$conf_rol = $_SESSION['user']['role'];
					if($conf_rol == 'administrador'){
						redirect('../admin.php');
					}elseif($conf_rol == 'cliente'){
						redirect('../cliente.php');
					}
				}
		} else {
			redirect('../index.php?error_message=Usuario o clave incorrectos!');
		}


	} else {
		redirect('../index.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../index.php');
}