<?php
$db = new SQLite3('todo.db');

$result = $db->query("SELECT * FROM tasks ORDER BY created_at DESC");

$tasks = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
  $tasks[] = $row;
}

header('Content-Type: application/json');
echo json_encode($tasks);
?>
