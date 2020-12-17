<?php
 
include 'DBConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 $json = file_get_contents('php://input');
 
 $obj = json_decode($json,true);
 
 $Name = $obj['username'];
 
 $CheckSQL = "SELECT * FROM register WHERE username='$Name'";

 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

 if(isset($check)){
 
	 $Duplicate_email = 'Hai Selamat Datang Kembali';
	 
	 $Duplicate_email_Json = json_encode($Duplicate_email);
	 
	 echo $Duplicate_email_Json ; 
 
 }
 else{

	 $Sql_Query = "insert into register (username) values ('$Name')";
	 
	 
	if(mysqli_query($con,$Sql_Query)){
		 
		$MSG = 'hai Selamat Datang'  ;
		 
		$json = json_encode($MSG);
		 
		echo $json ;
	 
	 }
	 else{
	 
		 echo 'Try Again';
	 
	 }
}
 mysqli_close($con);
?>