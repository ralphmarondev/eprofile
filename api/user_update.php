<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['full_name'], $_POST['email'], $_POST['role'])) {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $sql = $mysqli->prepare("UPDATE users SET full_name = ?, email = ?, role = ? WHERE id = ?");
        $sql->bind_param("sssi", $full_name, $email, $role, $id);

        if ($sql->execute()) {
            echo json_encode(['success' => '1']);
        } else {
            echo json_encode(['success' => '0', 'error' => $sql->error]);
        }

        $sql->close();
    } else {
        echo json_encode(['success' => '0', 'error' => 'Missing parameters']);
    }
} else {
    echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
}

$mysqli->close();
