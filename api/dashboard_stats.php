<?php
require_once 'connection.php';
header('Content-Type: application/json');

try {
    $populationQuery = "SELECT COUNT(*) AS total FROM residents WHERE is_deleted = 0";
    $populationResult = $mysqli->query($populationQuery);
    $totalPopulation = $populationResult->fetch_assoc()['total'];

    $votersQuery = "SELECT COUNT(*) AS total FROM residents WHERE is_deleted = 0 AND is_voter = 'Yes'";
    $votersResult = $mysqli->query($votersQuery);
    $totalVoters = $votersResult->fetch_assoc()['total'];

    $beneficiariesQuery = "SELECT COUNT(*) AS total FROM residents WHERE is_deleted = 0 AND is_beneficiary = 'Yes'";
    $beneficiariesResult = $mysqli->query($beneficiariesQuery);
    $totalBeneficiaries = $beneficiariesResult->fetch_assoc()['total'];

    echo json_encode([
        "success" => "1",
        "total_population" => $totalPopulation,
        "total_voters" => $totalVoters,
        "total_beneficiaries" => $totalBeneficiaries
    ]);
} catch (Exception $e) {
    echo json_encode([
        "success" => "0",
        "message" => "Error: " . $e->getMessage()
    ]);
}
