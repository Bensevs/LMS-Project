<?php
$request = $_GET['q'] ?? '';

switch($request) {
    case 'register':
        include 'controllers/AuthController.php';
        break;
    case 'login':
        include 'controllers/AuthController.php';
        break;
    case 'courses':
        include 'controllers/CourseController.php';
        break;
    case 'enroll':
        include 'controllers/EnrollmentController.php';
        break;
    default:
        echo json_encode(['error' => 'Invalid endpoint']);
        break;
}
?>
