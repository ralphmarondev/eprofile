<?php
require_once 'connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$name = isset($data['name']) ? trim($data['name']) : '';
$barangay = isset($data['barangay']) ? trim($data['barangay']) : '';

try {
	$query = "SELECT * FROM residents WHERE is_deleted = 0";
	$params = [];
	$types = "";

	if (!empty($name)) {
		$query .= " AND CONCAT(first_name, ' ', last_name) LIKE ?";
		$params[] = "%$name%";
		$types .= "s";
	}

	if (!empty($barangay)) {
		$query .= " AND barangay = ?";
		$params[] = $barangay;
		$types .= "s";
	}

	$stmt = $mysqli->prepare($query);

	if (!empty($params)) {
		$stmt->bind_param($types, ...$params);
	}

	$stmt->execute();
	$result = $stmt->get_result();
	$residents = [];

	while ($row = $result->fetch_assoc()) {
		$residents[] = $row;
	}

	echo json_encode([
		"success" => "1",
		"residents" => $residents
	]);
} catch (Exception $e) {
	echo json_encode([
		"success" => "0",
		"message" => "Error: " . $e->getMessage()
	]);
}
