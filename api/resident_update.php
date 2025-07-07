<?php
require_once 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo json_encode(['success' => "0", 'error' => 'Invalid request method']);
	exit;
}

if (!isset($_GET['id'])) {
	echo json_encode(['success' => "0", 'error' => 'Missing resident ID']);
	exit;
}

$id = intval($_GET['id']);

// Sanitize and prepare inputs
$first_name = $_POST['first_name'] ?? '';
$middle_name = $_POST['middle_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$suffix = $_POST['suffix'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$birthplace = $_POST['birthplace'] ?? '';
$gender = $_POST['gender'] ?? '';
$civil_status = $_POST['civil_status'] ?? '';
$citizen = $_POST['citizen'] ?? '';
$religion = $_POST['religion'] ?? '';
$height_cm = $_POST['height_cm'] ?? '';
$weight_kg = $_POST['weight_kg'] ?? '';
$mother_name = $_POST['mother_name'] ?? '';
$father_name = $_POST['father_name'] ?? '';
$is_voter = $_POST['is_voter'] ?? '';
$is_beneficiary = $_POST['is_beneficiary'] ?? '';
$categories = $_POST['beneficiary'] ?? '';
$barangay = $_POST['barangay'] ?? '';
$street = $_POST['street'] ?? '';
$email = $_POST['email'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';

// Check for uploaded picture
$picturePath = null;
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
	$uploadDir = '../data/uploads/';
	if (!file_exists($uploadDir)) {
		mkdir($uploadDir, 0777, true);
	}

	$tmpName = $_FILES['picture']['tmp_name'];
	$ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

	$sanitizedFirstName = preg_replace('/[^a-zA-Z0-9_-]/', '', strtolower($first_name));
	$timestamp = time();
	$filename = "profile_{$sanitizedFirstName}_{$timestamp}." . strtolower($ext);
	$destination = $uploadDir . $filename;

	if (move_uploaded_file($tmpName, $destination)) {
		$picturePath = 'data/uploads/' . $filename;

		// Delete old picture from DB if it exists
		// $res = $mysqli->query("SELECT picture FROM residents WHERE id = $id AND is_deleted = 0");
		// if ($res && $row = $res->fetch_assoc()) {
		// 	$oldPicture = '../' . $row['picture'];
		// 	if (!empty($row['picture']) && file_exists($oldPicture)) {
		// 		unlink($oldPicture);
		// 	}
		// }
	} else {
		echo json_encode(['success' => "0", 'error' => 'Failed to upload image']);
		exit;
	}
}

$sql = "UPDATE residents SET 
    first_name=?, middle_name=?, last_name=?, suffix=?, birthday=?, birthplace=?,
    gender=?, civil_status=?, citizen=?, religion=?, height_cm=?, weight_kg=?,
    mother_name=?, father_name=?, is_voter=?, is_beneficiary=?, categories=?, barangay=?,
    street=?, email=?, contact_number=?" .
	($picturePath ? ", picture=?" : "") . "
    WHERE id=? AND is_deleted = 0";

$stmt = $mysqli->prepare($sql);

if ($picturePath) {
	$stmt->bind_param(
		"ssssssssssssssssssssssi",
		$first_name,
		$middle_name,
		$last_name,
		$suffix,
		$birthday,
		$birthplace,
		$gender,
		$civil_status,
		$citizen,
		$religion,
		$height_cm,
		$weight_kg,
		$mother_name,
		$father_name,
		$is_voter,
		$is_beneficiary,
		$categories,
		$barangay,
		$street,
		$email,
		$contact_number,
		$picturePath,
		$id
	);
} else {
	$stmt->bind_param(
		"sssssssssssssssssssssi",
		$first_name,
		$middle_name,
		$last_name,
		$suffix,
		$birthday,
		$birthplace,
		$gender,
		$civil_status,
		$citizen,
		$religion,
		$height_cm,
		$weight_kg,
		$mother_name,
		$father_name,
		$is_voter,
		$is_beneficiary,
		$categories,
		$barangay,
		$street,
		$email,
		$contact_number,
		$id
	);
}

if ($stmt->execute()) {
	echo json_encode(['success' => "1"]);
} else {
	echo json_encode(['success' => "0", 'error' => $stmt->error]);
}

$stmt->close();
$mysqli->close();
