<?php
header("Content-Type: application/json");

// Sample backend data
$data = [
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
    // Add more data as needed...
];

// Get the roll number from the request
if (isset($_GET['roll_number'])) {
    $rollNumber = $_GET['roll_number'];
    $results = array_filter($data, function ($entry) use ($rollNumber) {
        return $entry['roll_number'] === $rollNumber;
    });

    if (!empty($results)) {
        echo json_encode(array_values($results));
    } else {
        echo json_encode(["error" => "No results found for the provided roll number."]);
    }
} else {
    echo json_encode(["error" => "Roll number not provided."]);
}
?>
