<?php
	$conn=mysqli_connect("localhost","root","","skillswap");
	if(empty($_POST["email"]) || empty($_POST["password"])){
		header("location:signin.php?empty=1");
	}
	else{
		$email=$_POST["email"];
		$pass=$_POST["password"];
		
		$rs=mysqli_query($conn,"select * from admin where email='$email'");
		if($r=mysqli_fetch_array($rs)){
			if($r["email"]==$email){
				if($r["password"]==$pass){
					setcookie("admin",$email,time()+3600*24*7);
					header("location:index.php");
				}
				else{
					header("location:index.php?invalid_pass=1");
				}
			}
			else{
				header("location:index.php?invalid_email=1");
			}
			
		}
		else{
			header("location:index.php?invalid=1");
		}
	}
?>