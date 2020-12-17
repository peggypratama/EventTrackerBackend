<?php

	include 'DBConfig.php';
 
	$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
	
	$domain_name = "http://192.168.43.170/event/" ;
	
	$target_dir = "uploads";
	
	$nama_event = $_POST['nama_event'];

 	$target_dir = $target_dir . "/" .$nama_event . ".jpeg";

 	$desk_event = $_POST['desk_event'];

	$desk_lokasi = $_POST['desk_lokasi'];

	$kota = $_POST['kota'];

	$tanggal = $_POST['tanggal'];

	$tiket = $_POST['tiket'];

	$cp = $_POST['cp'];
	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)){
		
		$target_dir = $domain_name . $target_dir ;

		$Sql_Query = "insert into event (nama_event, desk_event, desk_lokasi, kota, tanggal, tiket, cp, image_path) values ('$nama_event' , '$desk_event' , '$desk_lokasi', '$kota', '$tanggal', '$tiket' , '$cp' ,'$target_dir')";

		if(mysqli_query($con,$Sql_Query)){
 
			 $MSG = 'gas' ;

			$json = json_encode($MSG);
			 
			 echo $json ;
			 	$MESSAGE = "Image Uploaded Successfully." ;
			
			 
			 }
			 else{
			 
			 echo 'Try Again';
			 
			 }
			 mysqli_close($con);
					
		echo json_encode($MESSAGE);
	}


?>