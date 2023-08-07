<?php include("connection.php");

$date = $_REQUEST['getdate'];
$preheader = $_REQUEST['preheader'];

$utmID = "eqn". date('MdY', strtotime($date));
echo $utmID;

$saveQuery = "INSERT INTO `newsletterdates`(`date`, `utm_id`, `preheader`) VALUES ('$date','$utmID','$preheader')";

if($conn->query($saveQuery)){
  header('Location:addNewsletter.php');
    echo "working";
}else{
    echo "not";
}


?>
