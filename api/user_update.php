<?php
include './connection.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
	exit;
}

$required = ['id', 'full_name', 'email', 'password', 'confirmPassword', 'role', 'gender'];
foreach ($required as $key) {
	if (!isset($_POST[$key]) || $_POST[$key] === '') {
		echo json_encode(['success' => '0', 'error' => "Missing field: $key"]);
		exit;
	}
}

$id = intval($_POST['id']);
$full_name = trim($_POST['full_name']);
$email = trim($_POST['email']);
$role = strtolower(trim($_POST['role']));
$gender = strtolower(trim($_POST['gender']));
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if ($password !== $confirmPassword) {
	echo json_encode(['success' => '0', 'error' => 'Passwords do not match']);
	exit;
}

// Check email uniqueness
$check = $mysqli->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
$check->bind_param("si", $email, $id);
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
$sql = $mysqli->prepare("UPDATE users SET full_name=?, email=?, role=?, gender=?, password=? WHERE id=?");
$sql->bind_param("sssssi", $full_name, $email, $role, $gender, $password_hash, $id);

if ($sql->execute()) {
	echo json_encode(['success' => '1', 'message' => 'User updated successfully']);
} else {
	echo json_encode(['success' => '0', 'error' => $sql->error]);
}

$sql->close();
$mysqli->close();
