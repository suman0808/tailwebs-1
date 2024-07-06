<?php
session_start();
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style type="text/css">
    .box{
        padding: 20px;
    }
    .button-right{
        float: right;
        margin-top: -40px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tailwebs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="homepage.php">Home</a></li>
                </ul>
                <div class="d-flex" role="search">
                    <a class="btn btn-danger" href="logout.php" >Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from `students` where `id` = '$id'";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Something Went wrong".mysqli_error());
        }else{
            $row = mysqli_fetch_assoc($result);
        }

    }
    ?>
    <?php 

    if(isset($_POST['update_students']))
    {
        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $marks = $_POST['marks'];

        if($name == "" && $subject == "" && $marks == ""){
            header('location:homepage.php?message=Fields cannot be empty!!');
        }
        else{

            $query = "update `students` set `name` = '$name', `subject` = '$subject', `marks` = '$marks' where `id` = '$idnew'";
            $result = mysqli_query($conn, $query);

            if(!$result){
                die("Something Went wrong".mysqli_error());
            }else{
                header('location:homepage.php?update_msg=Data Updated Successfuly!!!!');
            }
        }
    }
    ?>
    <div class="container mt-5">
        <form class="" action="update.php?id_new=<?php echo $id; ?>" method="POST">
            <div class="form-group mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Subject</label>
                <input type="text" name="subject"  class="form-control" value="<?php echo $row['subject'];?>">
            </div>
            <div class="form-group mb-2">
                <label class="form-label">Marks</label>
                <input type="text" name="marks" class="form-control" value="<?php echo $row['marks'];?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="update_students">Update</button>
                <a href="homepage.php" class="btn btn-secondary">Close</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>