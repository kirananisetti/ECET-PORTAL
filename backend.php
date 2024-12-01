<?php
// Set headers for CORS and content type
header('Content-Type: application/json; charset=UTF-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Simulated database (replace with actual database queries)
$data = [
    [
        "rollNumber" => "23JD5A0201",
        "year" => "2",
        "semester" => "1",
        "subjectCode" => "CS101",
        "subjectName" => "Mathematics 4",
        "internals" => "18",
        "externals" => "A",
        "credits" => "3"
    ],
    [
        "rollNumber" => "23JD5A0201",
        "year" => "2",
        "semester" => "1",
        "subjectCode" => "MA101",
        "subjectName" => "Power Systems 2",
        "internals" => "16",
        "externals" => "B",
        "credits" => "3"
    ],
    [
        "rollNumber" => "23JD5A0202",
        "year" => "2",
        "semester" => "1",
        "subjectCode" => "EE201",
        "subjectName" => "Electrical Engineering Basics",
        "internals" => "17",
        "externals" => "D",
        "credits" => "3"
    ]
];

try {
    // Retrieve JSON input
    $input = json_decode(file_get_contents('php://input'), true);

    // Validate input
    if (!isset($input['rollNumber'], $input['year'], $input['semester'])) {
        echo json_encode(["status" => "error", "message" => "Invalid input data."]);
        exit;
    }

    $rollNumber = $input['rollNumber'];
    $year = $input['year'];
    $semester = $input['semester'];

    // Filter data
    $results = array_filter($data, function ($item) use ($rollNumber, $year, $semester) {
        return $item['rollNumber'] === $rollNumber && $item['year'] === $year && $item['semester'] === $semester;
    });

    // Return results
    if (!empty($results)) {
        echo json_encode(["status" => "success", "results" => array_values($results)]);
    } else {
        echo json_encode(["status" => "error", "message" => "No results found for the provided details."]);
    }
} catch (Exception $e) {
    // Handle server-side errors
    echo json_encode(["status" => "error", "message" => "Server error: " . $e->getMessage()]);
}
