<?php
session_start();
include("connect.php");


if(isset($_POST['add_students']))
{

	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$marks = $_POST['marks'];

	if($name == "" && $subject == "" && $marks == ""){
		header('location:homepage.php?message=Fields cannot be empty!!');
	}
	else{
		$query = "insert into `students` (`name`, `subject`, `marks`) values('$name', '$subject', '$marks')";		
		$result = mysqli_query($conn, $query);
		if(!$result){
			die("Something Went wrong".mysqli_error());
		}else{
			header('location:homepage.php?inser_msg=Data Added Successfuly!!!!');
		}
	}
}
?>