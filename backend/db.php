<?php
class Database extends SQLite3 {
    function __construct() {
        $this->open(__DIR__ . '/todo.db');
    }
}
?>
