<?php
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
    exit;
}

// Extract and sanitize input
function sanitize($key) {
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
$categories = sanitize('beneficiary'); // comma-separated list
$barangay = sanitize('barangay');
$street = sanitize('street');
$email = sanitize('email');
$contact_number = sanitize('contact_number');
$picture = sanitize('picture');

if ($first_name === '' || $last_name === '' || $gender === '' || $birthday === '') {
    echo json_encode(['success' => '0', 'error' => 'Missing required fields']);
    exit;
}

try {
    $sql = $mysqli->prepare("INSERT INTO residents (
        first_name, middle_name, last_name, suffix, gender, birthday, b_place, civil_status, citizen,
        religion, height, weight, motherName, fatherName, voter, beneficiary, categories,
        barangay, street, contact_number, email, picture
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql->bind_param(
        "ssssssssssssssssssssss",
        $first_name, $middle_name, $last_name, $suffix, $gender, $birthday, $b_place,
        $civil_status, $citizen, $religion, $height, $weight, $motherName, $fatherName,
        $voter, $is_beneficiary, $categories, $barangay, $street, $contact_number,
        $email, $picture
    );

    if ($sql->execute()) {
        echo json_encode(['success' => '1']);
    } else {
        echo json_encode(['success' => '0', 'error' => $sql->error]);
    }

    $sql->close();
} catch (Exception $e) {
    echo json_encode(['success' => '0', 'error' => $e->getMessage()]);
}

$mysqli->close();
