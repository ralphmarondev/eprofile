<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$required = ['full_name', 'email', 'role', 'gender', 'password', 'confirmPassword'];
	foreach ($required as $field) {
		if (empty($_POST[$field])) {
			echo json_encode(['success' => '0', 'error' => "Missing field: $field"]);
			exit;
		}
	}

	$full_name = trim($_POST['full_name']);
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

	if ($check->num_rows > 0) {
		echo json_encode(['success' => '0', 'error' => 'Email already exists']);
		$check->close();
		$mysqli->close();
		exit;
	}
	$check->close();

	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	$sql = $mysqli->prepare("INSERT INTO users (full_name, email, role, gender, password) VALUES (?, ?, ?, ?, ?)");
	$sql->bind_param("sssss", $full_name, $email, $role, $gender, $password_hash);

	if ($sql->execute()) {
		echo json_encode(['success' => '1', 'message' => 'New administrator added successfully']);
	} else {
		echo json_encode(['success' => '0', 'error' => $sql->error]);
	}

	$sql->close();
	$mysqli->close();
} else {
	echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
}
