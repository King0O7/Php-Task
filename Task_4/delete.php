<?php
include "db.php";
if ($connection->connect_error){
die("Could not connect to the server: " . $connection->connect_error);
}
$id = $_GET['delete'];
$query = "DELETE FROM Final WHERE id = '$id' ";
$result = mysqli_query($connection,$query);
if(!$result){
    die("Cannot Delete!!".mysqli_error($connection)) ;
}
else{
    echo "<script> window.location.href='list_all_data.php';</script>";
}
?>