<?php
include 'config.php';
session_start();

if(!isset($_SESSION['user_name'])) {
    header('location:error.php');

} else {
    if(isset($_GET['codeid'])) {
        
        $codeid=$_GET['codeid'];
        $data = json_decode(file_get_contents("php://input"));
        $sql="UPDATE `booking` SET `current_status` = 'Cancelled' WHERE `booking`.`codeid` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $codeid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
}
?>