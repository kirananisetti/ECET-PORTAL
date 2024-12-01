<?php
// Simulated database (replace this with actual database queries)
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
        "rollNumber" => "23JD5A0201",
        "year" => "2",
        "semester" => "1",
        "subjectCode" => "EE201",
        "subjectName" => "Electrical Engineering Basics",
        "internals" => "17",
        "externals" => "D",
        "credits" => "3"
    ]
];

$rollNumber = $_GET['rollNumber'];
$year = $_GET['year'];
$semester = $_GET['semester'];

$results = array_filter($data, function ($item) use ($rollNumber, $year, $semester) {
    return $item['rollNumber'] === $rollNumber && $item['year'] === $year && $item['semester'] === $semester;
});

header('Content-Type: application/json');
echo json_encode(array_values($results));
?>
