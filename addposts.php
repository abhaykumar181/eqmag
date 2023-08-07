<?php include("connection.php"); ?>
<?php

$getall = "SELECT * FROM `categories`";
$result = $conn->query($getall);

$getDatesQuery = "SELECT `date` FROM `newsletterdates` WHERE nid='{$_GET['nid']}'";

$datesResult = $conn->query($getDatesQuery);
// echo "
// <div class='display_grid' style='color:green'>
//     <div>Newsletter ID</div>
//     <div>Date</div>
//     <div>Add Post</div>
//     <div>View</div>
// </div>
    
// ";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Posts</title>
    
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
    min-width:350px;
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
    
    <form class="form_grid" method="post" action="save.php " >

        <div style="font-size:25px;font-weight:bold;">Add Posts</div>
        <div></div>

        <div>On Date</div>
        <div>
            <?php
                while ($row = $datesResult->fetch_assoc()) {
                    $date = $row['date'];
                    echo $date . "<br>";
                }
            ?>
        </div>
        

        <div>Category Name</div>
        <div>
            <!-- <input type="text" name="cate"  /> -->

            <?php
            
            if($result->num_rows > 0){

                    echo "<select name='selectedOpt'>";
                    
                    while($row = $result->fetch_assoc()){
                        $catName = $row['catName'];
                        $catid = $row['cid'];
                        
                        echo "<option value='$catid' required>$catName</option>";
                    
                    }
                    echo "</select>";
                
            }
            else{
              echo "<center style='color:red;'>No records found</center>";
            }


            ?>
        </div>

        <div>Title</div>
        <div><input type="text" name="title" style="width:100% " required /></div>

        <div>Add image</div>
        <div><input type="text" name="imglink" style="width:100%" required /></div>

        <div>Add Description</div>
        <div><textarea class="t_area" name="description" required></textarea></div>

        <div>Post URL</div>
        <div><input type="text" name="posturl" style="width:100%" required /></div>

        <input type="hidden" name="nid" value="<?php echo $_GET['nid']; ?>">


        <div>Add Data</div>
        <div><input type="submit" name="submit" /></div>


    </form>
</body>
</html>