<?php
include './connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($user = $result->fetch_assoc()){
        echo json_encode(['success'=>'1','user'=>$user]);
    } else {
        echo json_encode(['success'=>'0','error'=>'User not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['success'=>'0','error'=>'Missing ID']);
}
$mysqli->close();
