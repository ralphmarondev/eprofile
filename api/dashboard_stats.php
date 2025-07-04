<?php
require_once 'connection.php';
header('Content-Type: application/json');

// make sure you're using the right mysqli instance
try {
    // Total population (not deleted)
    $populationQuery = "SELECT COUNT(*) AS total FROM residents WHERE is_deleted = 0";
    $populationResult = $mysqli->query($populationQuery);
    $totalPopulation = $populationResult->fetch_assoc()['total'];

    // Total voters (Yes and not deleted)
    $votersQuery = "SELECT COUNT(*) AS total FROM residents WHERE is_deleted = 0 AND voter = 'Yes'";
    $votersResult = $mysqli->query($votersQuery);
    $totalVoters = $votersResult->fetch_assoc()['total'];

    // Total beneficiaries (Yes and not deleted)
    $beneficiariesQuery = "SELECT COUNT(*) AS total FROM residents WHERE is_deleted = 0 AND beneficiary = 'Yes'";
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
