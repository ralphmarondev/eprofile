<?php
include 'connection.php';
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
    exit;
}

// Extract and sanitize input
function sanitize($key)
{
    return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

$first_name = sanitize('first_name');
$middle_name = sanitize('middle_name');
$last_name = sanitize('last_name');
$suffix = sanitize('suffix');
$birthday = sanitize('birthday');
$b_place = sanitize('b_place');
$gender = sanitize('gender');
$civil_status = sanitize('civil_status');
$citizen = sanitize('citizen');
$religion = sanitize('religion');
$height = sanitize('height');
$weight = sanitize('weight');
$motherName = sanitize('motherName');
$fatherName = sanitize('fatherName');
$voter = sanitize('voter');
$is_beneficiary = sanitize('is_beneficiary');
$categories = sanitize('beneficiary'); // comma-separated
$barangay = sanitize('barangay');
$street = sanitize('street');
$email = sanitize('email');
$contact_number = sanitize('contact_number');

// Validate required fields
if ($first_name === '' || $last_name === '' || $gender === '' || $birthday === '') {
    echo json_encode(['success' => '0', 'error' => 'Missing required fields']);
    exit;
}

// Handle picture upload
$picture_path = '';
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../data/uploads/';
    $fileTmp = $_FILES['picture']['tmp_name'];
    $fileExt = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $fileName = uniqid('profile_', true) . '.' . strtolower($fileExt);
    $destination = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmp, $destination)) {
        $picture_path = 'data/uploads/' . $fileName; // relative path to store in DB
    } else {
        echo json_encode(['success' => '0', 'error' => 'Failed to move uploaded file']);
        exit;
    }
}

try {
    $sql = $mysqli->prepare("INSERT INTO residents (
        first_name, middle_name, last_name, suffix, gender, birthday, b_place, civil_status,
        citizen, religion, height, weight, motherName, fatherName, voter, beneficiary,
        categories, barangay, street, contact_number, email, picture
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql->bind_param(
        "ssssssssssssssssssssss",
        $first_name,
        $middle_name,
        $last_name,
        $suffix,
        $gender,
        $birthday,
        $b_place,
        $civil_status,
        $citizen,
        $religion,
        $height,
        $weight,
        $motherName,
        $fatherName,
        $voter,
        $is_beneficiary,
        $categories,
        $barangay,
        $street,
        $contact_number,
        $email,
        $picture_path
    );

    if ($sql->execute()) {
        echo json_encode(['success' => '1', 'id' => $mysqli->insert_id]);
    } else {
        echo json_encode(['success' => '0', 'error' => $sql->error]);
    }

    $sql->close();
} catch (Exception $e) {
    echo json_encode(['success' => '0', 'error' => $e->getMessage()]);
}

$mysqli->close();
