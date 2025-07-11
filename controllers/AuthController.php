<?php
include '../config/db.php';
include '../helpers/jwt.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $email = $input['email'];
    $password = password_hash($input['password'], PASSWORD_DEFAULT);
    $name = $input['name'];

    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();
    echo json_encode(['status' => 'success']);
}

if ($method === 'GET') {
    $email = $_GET['email'];
    $pass = $_GET['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result && password_verify($pass, $result['password'])) {
        $token = createJWT($result['id']);
        echo json_encode(['token' => $token, 'user' => $result]);
    } else {
        echo json_encode(['error' => 'Invalid credentials']);
    }
}
?>
