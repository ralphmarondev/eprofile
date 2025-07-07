<?php
require_once 'connection.php';
header('Content-Type: application/json');

$category = isset($_GET['category']) ? $_GET['category'] : '';

if (!$category) {
	echo json_encode(['success' => '0', 'message' => 'Missing category']);
	exit;
}

try {
	$stmt = $mysqli->prepare("
		SELECT first_name, middle_name, last_name, gender, birthday, barangay, contact_number 
		FROM residents 
		WHERE is_deleted = 0 AND is_beneficiary = 'Yes' 
		AND FIND_IN_SET(?, REPLACE(categories, ' ', '')) > 0
	");
	$stmt->bind_param("s", $category);
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
