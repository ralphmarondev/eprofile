<?php
header('Content-Type: application/json');
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = json_decode(file_get_contents('php://input'), true);
  $id = isset($input['id']) ? intval($input['id']) : 0;

  if ($id > 0) {
    $stmt = $mysqli->prepare("UPDATE residents SET is_deleted = 1 WHERE id = ?");
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
