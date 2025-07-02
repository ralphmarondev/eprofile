<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		$role = 'user'; // default :)
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		// ✅ Check if email already exists
		$check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
		$check->bind_param("s", $email);
		$check->execute();
		$check->store_result();

		if ($check->num_rows > 0) {
			echo json_encode(['success' => '0', 'error' => 'Email already exists']);
			$check->close();
			$mysqli->close();
			exit;
		}
		$check->close();

		// Proceed to insert new user
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
