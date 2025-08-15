<?php
include 'connection.php';

$response = ['success' => '0', 'users' => []];

$sql = "SELECT id, full_name, email, role FROM users WHERE role IN ('admin','super_admin')";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$response['users'][] = $row;
	}
	$response['success'] = '1';
}

echo json_encode($response);
$mysqli->close();
