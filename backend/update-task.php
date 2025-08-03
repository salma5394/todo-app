<?php
$db = new SQLite3('todo.db');
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$status = $data['status'];

$stmt = $db->prepare("UPDATE tasks SET status = :status WHERE id = :id");
$stmt->bindValue(':status', $status);
$stmt->bindValue(':id', $id);
$stmt->execute();

echo json_encode(["success" => true]);
?>
