<?php
// Connect to MySQL database
include 'config.php';

// Retrieve data from people table
$sql = "SELECT booking.id, booking.destination, booking.current_status,
booking.time_in_time_out, booking.expected_date, booking.codeid, booking.price,
login.phone, login.email FROM booking CROSS JOIN login ON user_id = login.id ORDER BY booking.id DESC";
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