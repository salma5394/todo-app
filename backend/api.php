<?php
require_once 'db.php';
require_once 'functions.php';

$db = new Database();
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(getTasks($db));
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['task'])) {
            addTask($db, $data['task']);
            echo json_encode(['status' => 'Task added']);
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents('php://input'), $data);
        if (isset($data['id'])) {
            deleteTask($db, $data['id']);
            echo json_encode(['status' => 'Task deleted']);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id']) && isset($data['completed'])) {
            toggleTask($db, $data['id'], $data['completed']);
            echo json_encode(['status' => 'Task updated']);
        }
        break;

    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}
?>
