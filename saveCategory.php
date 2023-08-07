<?php include("connection.php"); 

$category = $_REQUEST['category'];
$url = $_REQUEST['categoryurl'];
$rand = rand(10000,99999);

$saveQuery = "INSERT INTO `categories`(`cid`, `catName`, `catUrl`) VALUES ('$rand','$category','$url')";

if($conn->query($saveQuery)){
    echo "working";
    header('Location:addCategory.php');
}else{
    echo "not";
}


echo $category . $url;

?>
