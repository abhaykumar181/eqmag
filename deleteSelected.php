<?php include("connection.php"); ?>

<?php

$id = $_GET['postid'];
echo $id;

$getselectedpost = " DELETE FROM `postsdata` WHERE `postid` = $id ";
$result = $conn->query($getselectedpost);

?>