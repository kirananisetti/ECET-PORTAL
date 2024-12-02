<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$rollNumber = $data['rollNumber'] ?? '';
$year = $data['year'] ?? '';
$semester = $data['semester'] ?? '';

// Validate input
if (empty($rollNumber) || empty($year) || empty($semester)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
    exit;
}

// Database connection
$host = 'localhost'; // Change as needed
$username = 'root'; // Change as needed
$password = ''; // Change as needed
$dbname = 'ecet_results'; // Change as needed

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
    exit;
}

$sql = "SELECT subjectCode, subjectName, internals, externals, credits 
        FROM results 
        WHERE rollNumber = ? AND year = ? AND semester = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $rollNumber, $year, $semester);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
    echo json_encode(['status' => 'success', 'results' => $results]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No results found.']);
}

$stmt->close();
$conn->close();
?>
