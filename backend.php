<?php
header('Content-Type: application/json');

// Sample database data
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
        "subjectName" => "Power Systems",
        "internals" => "17",
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

// Get POST data
$requestBody = file_get_contents('php://input');
$request = json_decode($requestBody, true);

$rollNumber = $request['rollNumber'];
$year = $request['year'];
$semester = $request['semester'];

// Filter data based on user input
$results = array_filter($data, function ($record) use ($rollNumber, $year, $semester) {
    return $record['rollNumber'] === $rollNumber && $record['year'] === $year && $record['semester'] === $semester;
});

// Return results as JSON
echo json_encode(array_values($results));
?>
