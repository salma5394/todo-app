<?php
$db = new SQLite3('todo.db');
$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'];

$stmt = $db->prepare("INSERT INTO tasks (title, status) VALUES (:title, 0)");
$stmt->bindValue(':title', $title);
$stmt->execute();

echo json_encode(["success" => true]);
?>
