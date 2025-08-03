<?php
$db = new SQLite3('todo.db');
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();

echo json_encode(["success" => true]);
?>
