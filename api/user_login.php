<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $mysqli->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();

      if (password_verify($password, $user['password'])) {
        echo json_encode([
          'success' => '1',
          'message' => 'Login successful',
          'id' => $user['id'],
          'email' => $user['email'],
          'role' => $user['role']
        ]);
      } else {
        echo json_encode(['success' => '0', 'error' => 'Invalid email or password']);
      }
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
