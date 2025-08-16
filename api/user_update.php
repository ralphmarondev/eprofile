<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_GET['id'], $_POST['full_name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'], $_POST['role'], $_POST['gender'])) {
		$id = intval($_GET['id']);
		$full_name = $_POST['full_name'];
		$email = trim($_POST['email']);
		$role = strtolower(trim($_POST['role'])); // store as lowercase: 'admin' or 'super_admin'
		$gender = strtolower(trim($_POST['gender']));
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];

		if ($password !== $confirmPassword) {
			echo json_encode(['success' => '0', 'error' => 'Passwords do not match']);
			exit;
		}

		$check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
		$check->bind_param("s", $email);
		$check->execute();
		$check->store_result();

		if ($check->num_rows > 1) {
			echo json_encode(['success' => '0', 'error' => 'Email already exists']);
			$check->close();
			$mysqli->close();
			exit;
		}
		$check->close();

		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		$sql = $mysqli->prepare("UPDATE users SET full_name = ?, email = ?, role = ?, gender = ?, password = ? WHERE id = ?");
		$sql->bind_param("sssssi", $full_name, $email, $role, $gender, $password_hash, $id);

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
