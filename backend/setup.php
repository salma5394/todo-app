<?php
$db = new SQLite3('todo.db');

// Create the tasks table
$db->exec("CREATE TABLE IF NOT EXISTS tasks (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  title TEXT,
  status INTEGER DEFAULT 0,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

echo "Database and table created.";
?>
