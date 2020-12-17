<?php
 
include 'DBConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $json = file_get_contents('php://input');
 
 $obj = json_decode($json,true);
 
 $Name = $obj['id'];

 $CheckSQL = "SELECT * FROM register WHERE id='$id'";

$result = $con->query($CheckSQL);

if ($result->num_rows >0) {
 
 while($row[] = $result->fetch_assoc()) {
 
 $Item = $row;
 
 $json = json_encode($Item);
 
 }
 
}else {
	
 echo "No Results Found.";
 
}

echo $json;

$con->close();
?>