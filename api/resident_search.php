<?php
require_once 'connection.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$name = isset($data['name']) ? trim($data['name']) : '';
$barangay = isset($data['barangay']) ? trim($data['barangay']) : '';

try {
    $query = "SELECT * FROM residents WHERE 1";

    $params = [];

    if (!empty($name)) {
        $query .= " AND CONCAT(first_name, ' ', last_name) LIKE ?";
        $params[] = "%$name%";
    }

    if (!empty($barangay)) {
        $query .= " AND barangay = ?";
        $params[] = $barangay;
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);

    $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
?>
