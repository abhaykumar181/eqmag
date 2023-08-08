<?php 

include("connection.php"); 
$getselectedpost = "SELECT * FROM `postsdata` WHERE postid = '{$_GET['pid']}' ";
$result = $conn->query($getselectedpost);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Posts</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>

@import url('https://fonts.googleapis.com/css2?family=Figtree&display=swap');

*{
    font-family: 'Figtree', sans-serif;
}

.form_grid{
    display:grid;
    justify-content:center;
    align-content:center;
    grid-template-columns: auto auto;
    padding:15px;
}

.form_grid > div{
    padding: 5px;
    outline:none;
}

.t_area{
    min-width:400px;
    min-height:130px;
}

select{
    width:150px;
    border:1px solid grey;
    outline:none;
}
input , textarea{
    outline:none;
}

</style>

<body>

<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">EQ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="addNewsletter.php">Add Newsletter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addCategory.php">Add Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ourposts.php">All Posts</a>
        </li>
      </ul>
        </div>
    </div>
</nav>
<!-- Nav End -->

<?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $title = $row['title'];
            $imgurl = $row['imgurl'];
            $description = $row['description'];
            $posturl = $row['posturl'];

        }
    }
?>
    
    <form class="form_grid" method="post" action="" >

        <div style="font-size:25px;font-weight:bold;">Edit this Post</div>
        <div></div>

        <div>Title</div>
        <div><textarea style='min-height:70px;min-width:400px;min-height:120px' name="newtitle" required> <?php echo $title ?>  </textarea></div>

        <div>Image URL</div>
        <div><textarea style='min-height:70px;min-width:400px;min-height:120px' name="newimgurl" required> <?php echo $imgurl ?> </textarea></div>

        <div>Description</div>
        <div><textarea class="t_area" name="newdescription" style="min-height:120px" required> <?php echo $description ?> </textarea></div>

        <div>Post URL</div>
        <div><textarea style='min-height:70px;min-width:400px;min-height:120px' name="newposturl" required> <?php echo $posturl ?> </textarea></div>

        <div>Edit Data</div>
        <div><input type="submit" name="submit" /></div>


    </form>

    
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $editedTitle = $_POST['newtitle'];
    $editedImageURL = $_POST['newimgurl'];
    $editedDescription = $_POST['newdescription'];
    $editedPostURL = $_POST['newposturl'];

    $update = "UPDATE `postsdata` SET `title`='$editedTitle',
    `imgurl`='$editedImageURL',`description`='$editedDescription',
    `posturl`='$editedPostURL' WHERE `postid`='{$_GET['pid']}' ";
    $runquery = $conn->query($update);

    if($runquery){
      header('Location:ourposts.php');
    }else
    {
      echo "failed to save data";
    }
  
}

?>