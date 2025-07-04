<?php
require_once 'connection.php';
header('Content-Type: application/json');

// Validate ID from GET
if (!isset($_GET['id'])) {
	echo json_encode(['success' => '0', 'message' => 'Missing resident ID']);
	exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM residents WHERE id = ? AND is_deleted = 0";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
	echo json_encode(['success' => '0', 'message' => 'Resident not found']);
	exit;
}

$resident = $result->fetch_assoc();

// Convert null values to empty strings
foreach ($resident as $key => $value) {
	if (is_null($value)) {
		$resident[$key] = '';
	}
}

echo json_encode([
	'success' => '1',
	'resident' => $resident
]);

$stmt->close();
$mysqli->close();
