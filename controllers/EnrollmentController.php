<?php
include '../config/db.php';
header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);
$userId = $input['user_id'];
$courseId = $input['course_id'];

$sql = "INSERT INTO enrollments (user_id, course_id, enrolled_at) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $userId, $courseId);
$stmt->execute();
echo json_encode(['status' => 'enrolled']);
?>
