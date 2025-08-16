<?php
include './connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = $mysqli->prepare("DELETE FROM users WHERE id = ?");
        $sql->bind_param("i", $id);

        if ($sql->execute()) {
            echo json_encode(['success' => '1']);
        } else {
            echo json_encode(['success' => '0', 'error' => $sql->error]);
        }

        $sql->close();
    } else {
        echo json_encode(['success' => '0', 'error' => 'Missing ID']);
    }
} else {
    echo json_encode(['success' => '0', 'error' => 'Invalid request method']);
}

$mysqli->close();
