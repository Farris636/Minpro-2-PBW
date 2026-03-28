<?php
header("Content-Type: application/json");

include '../koneksi.php';

$data = [];

// PROFILE
$result = $conn->query("SELECT * FROM profile LIMIT 1");
$data['profile'] = $result->fetch_assoc();

$result = $conn->query("SELECT * FROM skills");
$data['skills'] = $result->fetch_all(MYSQLI_ASSOC);

$result = $conn->query("SELECT * FROM experiences");
$data['experiences'] = $result->fetch_all(MYSQLI_ASSOC);

$result = $conn->query("SELECT * FROM certificates");
$data['certificates'] = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);
?>