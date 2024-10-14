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
    exit;
}

function getStudent($conn) {
    $response = array();

    $student_id = $_POST['id'];

    $query = "SELECT * FROM student WHERE id = '$student_id'";

    $result = $conn -> query($query);

    if($result){

        $data = $result -> fetch_assoc();

        $response = array("status" => true,"data" => $data);

    }else {
        $response = array("status" => false,"data" => $conn ->error);
    }

    echo json_encode($response);
    exit;
}

function addStudent ($con) {
        
    $id= $_POST['student_id'];
    $name= $_POST['student_name'];
    $class= $_POST['student_class'];
    
    $response = array();

    $query = "INSERT INTO student(id,name,class) VALUES('$id','$name','$class')";

    $result = $con -> query($query);

    if($result){
        $response = array("status"=>true,"data"=> "Successfully added");
    }else {
        $response = array("status"=>false,"data"=> $con -> error);
    }

    echo json_encode($response);
    exit;
}

function updateStudent($con) {
    $response = array();

    $id= $_POST['student_id'];
    $name= $_POST['student_name'];
    $class= $_POST['student_class'];
    
    $query = "UPDATE  student SET name='$name', class='$class' WHERE id='$id'";

    $result = $con -> query($query);

    if($result){
        $response = array("status"=>true,"data"=> "Successfully updated");
    }else {
        $response = array("status"=>false,"data"=> $con -> error);
    }

    echo json_encode($response);
    exit;
}

function deleteStudent ($con) {
    
    $student_id  = $_POST['id'];
    $response = array();

    $query = "DELETE FROM student WHERE id ='$student_id'";

    $result = $con -> query($query);

    if($result){
        $response = array("status"=>true,"data"=> "Successfully deleted");
    }else {
        $response = array("status"=>false,"data"=> $con -> error);
    }

    echo json_encode($response);
    exit;
}

if(isset($action)){
    $action($connection);
}


?>