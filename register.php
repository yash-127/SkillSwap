<?php
	if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) ||empty($_POST["phone"]) ||empty($_POST["address"])){
		header("location:index.php?empty=1");
	}
	else{
		$name = $_POST["name"];
		$email = $_POST["email"];
		$pass = $_POST["password"];
		$phn = $_POST["phone"];
		$add = $_POST["address"];
		$conn = mysqli_connect("localhost","root","","skillswap");
		if(mysqli_query($conn,"insert into admin values('$name','$email','$pass',$phn,'$add')")>0){
			header("location:index.php?success=1");
		}
		else{
			header("location:index.php?again=1");
		}
	}
?>