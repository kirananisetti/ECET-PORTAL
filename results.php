<?php
// Sample Results Data
$results = [
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022021",
        "subject_name" => "PYTHON PROGRAMMING",
        "internals" => 24,
        "grade" => "F",
        "credits" => 0
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022022",
        "subject_name" => "DIGITAL ELECTRONICS",
        "internals" => 24,
        "grade" => "D",
        "credits" => 3
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022023",
        "subject_name" => "POWER SYSTEM-I",
        "internals" => 24,
        "grade" => "D",
        "credits" => 3
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022024",
        "subject_name" => "INDUCTION AND SYNCHRONOUS MACHINES",
        "internals" => 24,
        "grade" => "F",
        "credits" => 0
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022025",
        "subject_name" => "PYTHON PROGRAMMING LAB",
        "internals" => 14,
        "grade" => "A+",
        "credits" => 1.5
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022026",
        "subject_name" => "INDUCTION AND SYNCHRONOUS MACHINES LAB",
        "internals" => 15,
        "grade" => "A+",
        "credits" => 1.5
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022027",
        "subject_name" => "DIGITAL ELECTRONICS LAB",
        "internals" => 13,
        "grade" => "A+",
        "credits" => 1.5
    ],
    [
        "roll_number" => "23JD5A0201",
        "subject_code" => "R2022028",
        "subject_name" => "IOT APPLICATIONS OF ELECTRICAL ENGINEERING",
        "internals" => 0,
        "grade" => "A+",
        "credits" => 2
    ]
];

// Get the roll_number and semester from the frontend
$rollNumber = $_GET['roll_number'] ?? null;
$semester = $_GET['semester'] ?? null;

// Filter the results for the given roll number and semester (e.g., "2-2")
if ($rollNumber && $semester === "2-2") {
    $filteredResults = array_filter($results, function ($result) use ($rollNumber) {
        return $result["roll_number"] === $rollNumber;
    });

    // Return the filtered results as JSON
    echo json_encode($filteredResults);
} else {
    echo json_encode(["error" => "Invalid input"]);
}
?>
