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

function addStudent ($con) {
    $response = array();
    $data = "Successfully added";

    $id= $_POST['student_id'];
    $name= $_POST['student_name'];
    $class= $_POST['student_class'];
    
    $query = "INSERT INTO student(id,name,class) VALUES('$id','$name','$class')";

    $result = $con -> query($query);

    if($result){
        $response = array("status"=>true,"data"=> $data);
    }else {
        $response = array("status"=>false,"data"=> $con -> error);
    }

    echo json_encode($response) ;
}

if(isset($action)){
    $action($connection);
    $action($connection);
}


?>