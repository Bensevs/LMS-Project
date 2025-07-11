<?php
include '../config/db.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);

    $courses = [];
    while($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    echo json_encode($courses);
}

if ($method === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $title = $input['title'];
    $description = $input['description'];

    $sql = "INSERT INTO courses (title, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $description);
    $stmt->execute();
    echo json_encode(['status' => 'created']);
}
?>
