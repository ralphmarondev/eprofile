<?php
include './connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$role = 'user'; // default :)
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = $mysqli->prepare("INSERT INTO users (role, email, password) VALUES(?, ?, ?)");
		$sql->bind_param("sss", $role, $email, $password);

		if ($sql->execute()) {
			echo json_encode(['success' => '1']);
		} else {
			echo json_encode(['success' => '0', 'error' => $sql->error]);
		}
		$sql->close();
	} else {
		echo json_encode(['success' => '0', 'error' => 'Missing parameters']);
	}
} else {
	echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
}

$mysqli->close();