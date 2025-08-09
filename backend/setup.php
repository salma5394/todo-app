<?php
require_once 'db.php';

$db = new Database();
$db->exec("CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    task TEXT NOT NULL,
    completed INTEGER NOT NULL DEFAULT 0
)");

echo "Database ready.";
?>
