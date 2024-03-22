<?php
include 'config.php';
session_start();

if(!isset($_SESSION['admin_name'])) {
    header('location:error.php');
}
else {
    if(isset($_GET['codeid'])) {
        
        $codeid=$_GET['codeid'];

        $data = json_decode(file_get_contents("php://input"));

        $queries = [
            "INSERT INTO archived_booking
            SELECT * FROM booking WHERE codeid=?",
            "DELETE FROM booking WHERE codeid=?"
        ];
    
        foreach ($queries as $query) {
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $codeid);
            $stmt->execute();
        }

        if($stmt->affected_rows === 1) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
}
?>