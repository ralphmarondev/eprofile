<?php
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get raw input
  $input = json_decode(file_get_contents('php://input'), true);
  $id = isset($input['id']) ? intval($input['id']) : 0;

  if ($id > 0) {
    // Prepare and execute delete query
    $stmt = $mysqli->prepare("DELETE FROM residents WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
      echo json_encode(['success' => 1, 'message' => 'Resident deleted successfully.']);
    } else {
      echo json_encode(['success' => 0, 'message' => 'Failed to delete resident.']);
    }

    $stmt->close();
  } else {
    echo json_encode(['success' => 0, 'message' => 'Invalid resident ID.']);
  }
} else {
  echo json_encode(['success' => 0, 'message' => 'Invalid request method.']);
}

$mysqli->close();
