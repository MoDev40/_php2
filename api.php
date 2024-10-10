<?php

include 'connection.php';

header("Content-type:application/json");

$action = $_POST['action'];

function readAllData($conn) {
    $data = array();
    $response = array();

    $query = "SELECT * FROM student";

    $result = $conn -> query($query);

    if($result){
        while($row = $result -> fetch_assoc()){
            $data [] = $row; 
        }
        $response = array("status" => true,"data" => $data);
    }else {
        $response = array("status" => false,"data" => $conn ->error);
    }

    echo json_encode($response);
}


if(isset($action)){
    $action($connection);
}


?>