<?php
require_once 'connection.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['image'], $data['value'])) {
	http_response_code(400);
	echo json_encode(["success" => 0, "error" => "Missing image or value"]);
	exit;
}

$imageData = explode(',', $data['image'])[1];
$imageData = base64_decode($imageData);
$value = intval($data['value']); // This is resident ID

$dir = "../data/qrcodes/";
if (!is_dir($dir)) {
	mkdir($dir, 0777, true);
}

$filename = "qr_" . $value . "_" . time() . ".png";
$filepath = $dir . $filename;

if (!file_put_contents($filepath, $imageData)) {
	echo json_encode(["success" => 0, "error" => "Failed to save QR image"]);
	exit;
}

// Save relative path in DB
$relativePath = "data/qrcodes/" . $filename;

$sql = $mysqli->prepare("UPDATE residents SET qr_path = ? WHERE id = ?");
$sql->bind_param("si", $relativePath, $value);

if ($sql->execute()) {
	echo json_encode(["success" => 1, "path" => $relativePath]);
} else {
	echo json_encode(["success" => 0, "error" => $sql->error]);
}

$sql->close();
$mysqli->close();
