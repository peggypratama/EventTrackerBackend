<?php

	include 'DBConfig.php';
 
	$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

	$json = file_get_contents('php://input');
 
 	$obj = json_decode($json,true);
	
	$register_nama = $obj['register_nama'];

	$event_id = $obj['event_id'];

	$event_nama = $obj['event_nama'];
	
	$Sql_Query = "insert into history (register_nama, event_id, event_nama) values ('$register_nama' , '$event_id', '$event_nama')";

	if(mysqli_query($con,$Sql_Query)){
 
		$MSG = 'History' ;

		$json = json_encode($MSG);
			 
		echo $json ;			
			 
	}else{
			 
		echo 'Try Again';
			 
		}
			 
	mysqli_close($con);
					
	


?>