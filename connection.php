<?php 

$connection = new mysqli("localhost","root","","studdents");

if($connection -> connect_error) {
    echo $connection -> error;
}
?>