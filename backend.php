<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
fetch('https://kirananisetti.github.io//backend.php')

// Simulated database (replace with actual database or query logic)
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
    // Get input data from the frontend
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['rollNumber'], $input['year'], $input['semester'])) {
        echo json_encode(["status" => "error", "message" => "Invalid input data."]);
        exit;
    }

    $rollNumber = $input['rollNumber'];
    $year = $input['year'];
    $semester = $input['semester'];

    // Filter results based on input
    $results = array_filter($data, function ($item) use ($rollNumber, $year, $semester) {
        return $item['rollNumber'] === $rollNumber && $item['year'] === $year && $item['semester'] === $semester;
    });

    if (!empty($results)) {
        echo json_encode(["status" => "success", "results" => array_values($results)]);
    } else {
        echo json_encode(["status" => "error", "message" => "No results found for the provided details."]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Server error: " . $e->getMessage()]);
}
