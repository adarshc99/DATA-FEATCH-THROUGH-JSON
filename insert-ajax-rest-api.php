<?php

header("Content-Type: Application/JSON");
header("Access-Control-Allow-origin: *");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with");


$data = json_decode(file_get_contents("php://input"),true);
$Fname = $data["f_name"];
$Lname = $data["l_name"];
$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "INSERT into students(first_name,last_name) values('{$Fname}','{$Lname}')";
// $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_query($conn, $sql))
{
    echo json_encode(array("message"=>"Record inserted successfully","status"=>true));
}
else
{
    echo json_encode(array("message"=>"Record not inserted successfully","status"=>false));
}

mysqli_close($conn);
?>
