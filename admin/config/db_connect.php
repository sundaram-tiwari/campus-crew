<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "campus_crew";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("Error connecting database :- " . $conn -> connect_error);
}

?>