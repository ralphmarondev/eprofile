<?php
include 'connection.php';

$response = ['success' => '0', 'residents' => []];

$sql = "SELECT id, first_name, last_name, civil_status, email FROM residents WHERE is_deleted = 0 ORDER BY last_name";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $response['residents'][] = $row;
  }
  $response['success'] = '1';
}

echo json_encode($response);
$mysqli->close();
?>