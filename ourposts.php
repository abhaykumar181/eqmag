<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add NewsLetter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>

@import url('https://fonts.googleapis.com/css2?family=Figtree&display=swap');

*{
    font-family: 'Figtree', sans-serif;
    box-sizing:border-box;
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

.display_grid{
    display:grid;
    justify-content:center;
    align-content:center;
    grid-template-columns: auto auto auto auto auto auto auto auto;
    padding:10px;
    background-color:grey;
   
    /* grid-gap:10px; */
    
    
}

.display_grid > div{
    padding:7px;
    color:white;
    text-align:left;
    border:1px solid whitesmoke;
}

.btn{
    text-decoration:none;
    background-color:green;
    color:white;
    border-radius:1rem;padding:6px;
    cursor: pointer;
}

.btn2{
    text-decoration:none;
    background-color:grey;
    color:white;
    border-radius:1rem;padding:6px;border:none;
    cursor: pointer;
}

.display_grid .h_content{
  text-align:center;
  color:whitesmoke;
  font-size:1.2rem;
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
          <a class="nav-link " aria-current="page" href="addNewsletter.php">Add Newsletter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addCategory.php">Add Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="ourposts.php">All Posts</a>
        </li>
      </ul>
        </div>
    </div>
</nav>
<!-- Nav End -->





<?php

$getall = "SELECT * FROM `postsdata`";
$result = $conn->query($getall);

echo "
<div class='display_grid' style='color:green'>
    <div class='h_content' >Post ID</div>
    <div class='h_content' >Category ID</div>
    <div class='h_content' >Newsletter ID</div>
    <div class='h_content' >Title</div>
    <div class='h_content' >Preheader</div>
    <div class='h_content' >Image URL</div>
    <div class='h_content' >Post URL</div>
    <div class='h_content' >Actions</div>

    
";


if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $postid = $row['postid'];
        $cid = $row['cid'];
        $nid = $row['nid'];
        $title = $row['title'];
        $preheader = $row['preheader'];
        $imageurl = $row['imgurl'];
        $description = $row['description'];
        $posturl = $row['posturl'];

        echo "
            <div>$postid</div>
            <div>$cid</div>
            <div>$nid</div>
            <div>$title</div>
            <div>$preheader</div>
            <div>$imageurl</div>
            <div>$posturl</div>
            <div style='display:grid;grid-template-columns:auto auto;grid-gap:15px;'>
                <a href='editPost.php?pid=$postid' style='text-decoration:none;max-height:10px;' ><span style='border:none;background-color:white;color:black;padding:3px;' >Edit</span></a>
                <a id='confirmation' style='text-decoration:none;max-height:10px;' ><span style='border:none;background-color:red;color:white;padding:3px;' >
                  <button style='background-color:transparent;border:none;color:white' onclick='deletePost($postid)'>Delete</button>
                </span></a>
            </div>
            
        ";
    }
}



else{
  echo "<center style='color:white;grid-column:1/-1;'>No records found</center>";
}

echo "</div>";

?>



</body>
</html>

<script src="deleteRecord.js"></script> 