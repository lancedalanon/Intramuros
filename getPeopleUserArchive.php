<?php
// Connect to MySQL database
include 'config.php';

$user_id = $_GET["user_id"];

// Retrieve data from people table
$sql = "SELECT archived_booking.id, archived_booking.destination, archived_booking.current_status,
archived_booking.time_in_time_out, archived_booking.expected_date, archived_booking.codeid, archived_booking.price,
login.phone, login.email FROM archived_booking CROSS JOIN login ON user_id = login.id
WHERE user_id = '$user_id' ORDER BY archived_booking.id DESC";
$result = mysqli_query($conn, $sql);

// Fetch data as associative array
$people = array();
while ($row = mysqli_fetch_assoc($result)) {
  $people[] = $row;
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode(array("records" => $people));

// Close connection
mysqli_close($conn);
?>