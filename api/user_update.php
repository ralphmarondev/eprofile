<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['id'], $_POST['full_name'], $_POST['email'], $_POST['role'], $_POST['gender'])) {
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$gender = $_POST['gender'];

		$sql = $mysqli->prepare("UPDATE users SET full_name = ?, email = ?, role = ?, gender = ? WHERE id = ?");
		$sql->bind_param("ssssi", $full_name, $email, $role, $gender, $id);

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
