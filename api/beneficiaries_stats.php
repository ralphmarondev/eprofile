<?php
require_once 'connection.php';
header('Content-Type: application/json');

try {
	$stats = [
		"total_pwd" => 0,
		"total_4ps" => 0,
		"total_farmers" => 0,
		"total_single_parent" => 0,
		"total_scholar" => 0,
		"total_indigent" => 0,
		"total_senior_citizen" => 0
	];

	$queryMap = [
		"total_pwd" => "PWD",
		"total_4ps" => "4Ps",
		"total_farmers" => "Farmer",
		"total_single_parent" => "SingleParent",
		"total_scholar" => "Scholar",
		"total_indigent" => "Indigent",
		"total_senior_citizen" => "SeniorCitizen"
	];

	foreach ($queryMap as $key => $value) {
		$stmt = $mysqli->prepare("
            SELECT COUNT(*) AS total 
            FROM residents 
            WHERE is_deleted = 0 
              AND FIND_IN_SET(?, REPLACE(categories, ' ', '')) > 0
        ");

		$stmt->bind_param("s", $value);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stats[$key] = $row['total'];
		$stmt->close();
	}

	echo json_encode(array_merge(["success" => "1"], $stats));
} catch (Exception $e) {
	echo json_encode([
		"success" => "0",
		"message" => "Error: " . $e->getMessage()
	]);
}
