<?php
session_start();
include("connect.php");
?>

<?php 
if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "delete from `students` where `id` = '$id'";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Something Went wrong".mysqli_error());
        }else{
            header('location:homepage.php?delete_msg=Data Deleted Successfuly!!!!');
        }

    }
?>