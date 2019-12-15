<html>
<?php 


$conn = new mysqli("localhost","root","Divye-2001","myDB");

// Check connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT course from courses;";
$sql1="Insert into". $_POST["course"]."(notesType,downloads) values(".$_POST["NotesType"].",0);";
$sql2="Create table ".$_POST["course"]."(notesType VARCHAR(30) NOT NULL,downloads INT);";
$result = $conn->query($sql);
$upload=0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["course"]==$_POST["course"]){
            $conn->query($sql1);
            echo "inserted";
            $upload=1;
            break;
        }
    }   
    if($upload==0){
        $conn->query($sql2);
    }
}

$conn->close();
?>
