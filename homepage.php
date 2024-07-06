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
    <div class="container mt-5">
        <div class="box">
            <h1>All Students</h1>
            <button type="button" class="btn btn-primary button-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Students</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" action="insert_data.php" method="POST">
                    <div class="form-group mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject"  class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Marks</label>
                        <input type="text" name="marks" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="add_students">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped table-hover">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Marks</th>
      <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
    <?php

    $query = "select * from `students`";

    $results = mysqli_query($conn, $query);

    if(!$results){
        die("Something Went Wrong".mysqli_error());
    }else {

        while ($row = mysqli_fetch_assoc($results)) {
            ?>                
            <tr>
              <th scope="row"><?php echo $row['id'];?></th>
              <td><?php echo $row['name'] ;?></td>
              <td><?php echo $row['subject'] ;?></td>
              <td><?php echo $row['marks'] ;?></td>
              <td>
                  <div class="btn-group">
                      <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Action button
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="update.php?id=<?php echo $row['id'];?>">edit</a></li>
                        <li><a class="dropdown-item" href="delete.php?id=<?php echo $row['id'];?>">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>
        <?php 
    }
}
?>
</tbody>
</table>
<?php
if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
} 

if(isset($_GET['inser_msg'])){
    echo "<h6>".$_GET['inser_msg']."</h6>";
}

if(isset($_GET['update_msg'])){
    echo "<h6>".$_GET['update_msg']."</h6>";
} 
 
if(isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
} 
 
if(isset($_GET['exits_msg'])){
    echo "<h6>".$_GET['exits_msg']."</h6>";
} 
?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>