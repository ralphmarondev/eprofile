<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['image'], $data['value'])) {
	http_response_code(400);
	echo json_encode(["error" => "Missing image or value"]);
	exit;
}

$imageData = explode(',', $data['image'])[1];
$imageData = base64_decode($imageData);
$value = intval($data['value']);

$dir = "../data/qrcodes/";
if (!is_dir($dir)) {
	mkdir($dir, 0777, true);
}

$filename = $dir . "qr_" . $value . "_" . time() . ".png";
file_put_contents($filename, $imageData);

echo json_encode(["success" => 1, "path" => $filename]);
