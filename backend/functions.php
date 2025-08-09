<?php
require_once 'db.php';

function getTasks($db) {
    $result = $db->query("SELECT * FROM tasks ORDER BY id DESC");
    $tasks = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $tasks[] = $row;
    }
    return $tasks;
}

function addTask($db, $task) {
    $stmt = $db->prepare("INSERT INTO tasks (task, completed) VALUES (:task, 0)");
    $stmt->bindValue(':task', $task, SQLITE3_TEXT);
    return $stmt->execute();
}

function deleteTask($db, $id) {
    $stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    return $stmt->execute();
}

function toggleTask($db, $id, $completed) {
    $stmt = $db->prepare("UPDATE tasks SET completed = :completed WHERE id = :id");
    $stmt->bindValue(':completed', $completed, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    return $stmt->execute();
}
?>
