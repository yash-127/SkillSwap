<?php
	if(isset($_COOKIE["admin"])){
		$user=$_COOKIE["admin"];
		$conn=mysqli_connect("localhost","root","","skillswap");
		if(empty($_POST["category"])|| empty($_POST["listing-type"]) || empty($_POST["title"]) || empty($_POST["description"])){
			header("location:index.php?empty=1");
		}
		else{
			
			$cat = $_POST["category"];
			$listtype = $_POST["listing-type"];
			$topic = $_POST["title"];
			$des = $_POST["description"];
			echo "$listtype";
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from details");
			if($r=mysqli_fetch_array($rs)){
				$sn=$r[0];
			}
			$sn++;
			$a=array();
			for($i='A';$i<='Z';$i++){
				array_push($a,$i);
				if($i=='Z')
					break;
			}
			for($i='a';$i<='z';$i++){
				array_push($a,$i);
				if($i=='z')
					break;
			}
			for($i=0;$i<=9;$i++){
				array_push($a,$i);
			}
			shuffle($a);
			$code="";
			for($i=0;$i<7;$i++){
				$code.=$a[$i];
			}
			$code=$code."_".$sn;
			
			if(mysqli_query($conn,"insert into details values('$listtype',$sn,'$code','$cat','$topic','$user','$des')")>0){
				header("location:index.php?ListSuccess=1");
			}
			else{
				header("location:index.php?again=1");
			}
		}
	}
	else{
		header("location:index.php");
	}
?>