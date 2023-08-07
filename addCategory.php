<?php include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Category</title>
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


.display_grid{
    display:grid;
    justify-content:center;
    align-content:center;
    grid-template-columns: auto auto auto ;
    padding:5rem;
    background-color:grey;
    
    /* grid-gap:10px; */
    
    
}

.display_grid > div{
    padding:7px;color:white;
    text-align:left;border:1px solid whitesmoke;
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
          <a class="nav-link active" href="addCategory.php">Add Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ourposts.php">All Posts</a>
        </li>
      </ul>
        </div>
    </div>
</nav>
<!-- Nav End -->


<form class="form_grid" method="post" action="saveCategory.php">

<div><h1>Add category</h1></div>
<div></div>

<div>Category Name</div>
<div><input type="text" name="category" required /></div>

<div>Category URL</div>
<div><input type="text" name="categoryurl" required /></div>

<div>Add Category</div>
<div><input class='btn2' type="submit" name="submit" /></div>


</form>
</body>
</html>


<?php


$getall = "SELECT * FROM `categories`";
$result = $conn->query($getall);

echo "
<div class='display_grid' style='color:green'>
    <div class='h_content'>Category ID</div>
    <div class='h_content'>Category Name</div>
    <div class='h_content'>Category URl</div>

    
";


if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $cid = $row['cid'];
        $catname = $row['catName'];
        $caturl = $row['catUrl'];

        echo "
            <div>$cid</div>
            <div>$catname</div>
            <div>$caturl</div>
            
        ";
    }
}
else{
  echo "<center style='color:white;grid-column:1/-1;'>No records found</center>";
}

echo "</div>";
?>