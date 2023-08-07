<?php include("connection.php");

$nid = $_REQUEST['nid'];
$title = $_REQUEST['title'];
$imglink = $_REQUEST['imglink'];
$description = $_REQUEST['description'];
$posturl = $_REQUEST['posturl'];
$selectedCategory = $_REQUEST['selectedOpt'];;
$rand = rand(10000000,999999999);
echo $nid;
$saveQuery = "INSERT INTO `postsdata`( `cid`, `nid`, `title`, `imgurl`, `description`, `posturl`) 
              VALUES ('$selectedCategory','$nid','$title','$imglink','$description','$posturl')";

if($conn->query($saveQuery)){
    echo "working";
    header('Location:addNewsletter.php');
}else{
    echo "not";
}



?>
