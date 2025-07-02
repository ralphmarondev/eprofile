<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $mysqli->prepare("SELECT id, fullname, email FROM users WHERE email = ? AND password = ?");
    $sql->bind_param("ss", $email, $password);

    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();

      echo json_encode([
        'success' => '1',
        'message' => 'Login successful',
        'id' => $user['id'],
        'fullname' => $user['fullname'],
        'email' => $user['email']
      ]);
    } else {
      echo json_encode(['success' => '0', 'error' => 'Invalid email or password']);
    }

    $sql->close();
  } else {
    echo json_encode(['success' => '0', 'error' => 'Missing parameters']);
  }
} else {
  echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
}

$mysqli->close();