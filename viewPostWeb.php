<?php 
include("connection.php"); 
$getDatesQuery = "SELECT `date` FROM `newsletterdates` WHERE nid='{$_GET['nid']}'";
$datesResult = $conn->query($getDatesQuery);

?>

<!-- Download Button -->

<style>

.button_design{
    text-align:center;
    right:0;
    bottom:0;
    
}

#submit{
  background-color:grey;
  border:none;
  color:white;
  cursor: pointer;
  padding:10px;
}

</style>

<center>
<a class="button_design">
  <form method="POST" action="downloadPostweb.php?<?php echo $_SERVER['QUERY_STRING'] ?>">
    <input type="submit" name="submit" id="submit" value="D o w n l o a d" />
  </form>
</a>
</center>


<!-- End of download button -->



<?php ob_start(); ?>

<!--Main div starts here -->
<div data-template-version="1.0.5" data-canonical-name="CPE-PT17831" data-cpeid="w-1636628842593-564" style="display: block; max-width: 670px; margin: 0 auto;font-family: Helvetica, Arial, sans-serif;">
<div class="shell" data-cpeid="w-1636628842592-323" lang="en-US">

<!-- Header div starts here -->
<div class="c6" style="margin-bottom:7px"> 
    <table style="border-collapse: collapse;border-bottom: 1px solid gray;" width="100%" cellspacing="0" cellpadding="0" border="0">
     <tbody>
	  <tr>
       <td style="padding: 15px 0px;font-family: Arial, Helvetica, sans-serif; font-size: 17px;color:#303133;">
       <?php
        while ($row = $datesResult->fetch_assoc()) {
          $date = $row['date'];
          $dateObj = new DateTime($date);
          $formattedDate = $dateObj->format('F d, Y');

          echo "<p style='font-weight:bold;font-size:20px;color:#808080;margin-top:1px;margin-bottom: -12px;'>$formattedDate</p>";
        }
	    ?>
       </td>
      <td style="float: right;padding-top:25px;padding-bottom: 14px;" align="center">
		
		
     </td>
   </tr>
 </tbody>
</table>

</div>
<!-- Header div ends here -->

<?php
$getall = "SELECT `postid`, `cid`, `nid`, `title`, `imgurl`, `description`, `posturl` FROM `postsdata` WHERE nid='{$_GET['nid']}'";
$result = $conn->query($getall);


if($result->num_rows > 0){
  $i=1;
  $querystring = $_SERVER['QUERY_STRING'];

  unset($_GET['nid']);
  $qs = '?'.http_build_query($_GET);

    while($row = $result->fetch_assoc()){
        $postid = $row['postid'];
        $cid = $row['cid'];
        $nid = $row['nid'];
        $title = $row['title'];
        $imageurl = $row['imgurl'];
        $description = $row['description'];

        $posturl = $row['posturl'] . $qs;
        $questionMarkPosition = strpos($posturl, '?');
        if ($questionMarkPosition !== false && $questionMarkPosition > 0) {
            $posturl = substr_replace($posturl, '', $questionMarkPosition - 1, 1);
        }

        $getCategory = "SELECT `catName`,`catUrl` FROM `categories` WHERE cid='$cid'";
        $catresult = $conn->query($getCategory);
        $catName = "";
        
        
        if($catresult->num_rows > 0){
            while($catrow = $catresult->fetch_assoc()){
                $catName = $catrow['catName'];
                $catUrl = $catrow['catUrl'].$qs;

                $questionMarkPosition = strpos($catUrl, '?');
                if ($questionMarkPosition !== false && $questionMarkPosition > 0) {
                    $catUrl = substr_replace($catUrl, '', $questionMarkPosition - 1, 1);
                }

            }
        }
        
        echo " 
       
        <!-- post$i -->
        <div class='c6' style='margin-bottom:7px;text-align:left;font-weight:400;font-family:Helvetica, Arial, sans-serif;font-size:16px;color:#333;border-bottom: 1px solid gray;'>
        
        <table style='border-collapse: collapse;' width='100%' cellspacing='0' cellpadding='0' border='0'>
        <tbody>
        <tr>
         <td style='padding: 15px 0px;'>
          <h3 style='font-family:Assistant;font-size:16px;font-weight:700;margin-top:15px;margin-bottom:0'>
          <a style='color:#AB012B;text-decoration:none;' href='$catUrl' target='_blank' data-segment-action='add' data-segment-id='a2465648-43ce-11ec-93bc-fa163eb6961b'>$catName</a>
          </h3>
          <h2 style='font-family:\'DM Serif Display\', Sans-serif;font-size:27px;color:#303133;font-weight:400;font-style: normal;'>
          <a data-segment-action='add' data-segment-id='a2465648-43ce-11ec-93bc-fa163eb6961b' href='$posturl' target='_blank' style='color:#303133!important;text-decoration:none;border-bottom:none!important;'>
          <font color='#303133'>$title</font><br>
          </a>
          </h2>
         </td>
        </tr>
        </tbody></table>
        <a data-trackable='true' data-segment-id='a2465648-43ce-11ec-93bc-fa163eb6961b' data-segment-action='add' href='$posturl' style='text-decoration:none;border:none;' target='_blank' class=''>
        <img alt='$title' style='padding: 0px;display: block; width: 100%; max-width: 670px;' class='story-header-image' src='$imageurl' width='670'>
        </a>
        <table style='border-collapse: collapse;' width='100%' cellspacing='0' cellpadding='0' border='0'>
        <tbody>
        <tr>
         <td style='padding:15px 0px;'>
          <div>
          <p style='color:#000000;margin-top:0;margin-bottom:15px'>$description<br><a style='display: inline-block;color:#1c7ff2;text-decoration:underline;' href='$posturl' target='_blank'>Read More</a></p>
           </div>
        
         <!-- SOCIAL LINKS -->
          <table style='border-collapse: collapse;' width='100%' cellspacing='0' cellpadding='0' border='0'>
          <tbody>
          <tr>
           <td style='padding: 0px;'>Follow us on:</td>
          </tr>
           <tr>
            <td style='padding: 8px 0px;'>
            <a data-trackable='true' href='https://www.facebook.com/equicapmag' target='_blank' rel='noopener' style='text-decoration: none;' class=''>
          <img style='display: inline-block; width: 25px' src='https://equicapmag.com/wp-content/uploads/2021/12/facebook-icon.jpg' width='25'>
          </a><span>&nbsp;&nbsp;</span>
          <a data-trackable='true' href='https://twitter.com/eqmagazine_' target='_blank' rel='noopener' style='text-decoration: none;' class=''>
          <img style='display: inline-block; width: 25px' src='https://equicapmag.com/wp-content/uploads/2021/12/twitter-icon.jpg' width='25'>
          </a><span>&nbsp;&nbsp;</span>
          <a data-trackable='true' href='https://www.linkedin.com/company/equicapmag/' target='_blank' rel='noopener' style='text-decoration: none;' class=''>
          <img style='display: inline-block; width: 25px' src='https://equicapmag.com/wp-content/uploads/2021/12/linkedin-icon.jpg' width='25'>
          </a><span>&nbsp;&nbsp;</span>
            <a data-trackable='true' href='https://www.instagram.com/eqmagazine_/' target='_blank' rel='noopener' style='text-decoration: none;' class=''>
          <img style='display: inline-block; width: 25px' src='https://equicapmag.com/wp-content/uploads/2021/12/instagram-icon.jpg' width='25'>
          </a><span>&nbsp;&nbsp;</span>
          <a data-trackable='true' href='https://www.youtube.com/channel/UCBqidtPeR9hjEh78tzsL6pQ/videos' target='_blank' rel='noopener' style='text-decoration: none;' class=''>
          <img style='display: inline-block; width: 25px' src='https://equicapmag.com/wp-content/uploads/2021/12/youtube-icon.jpg' width='25'>
          </a><span>&nbsp;&nbsp;</span>
          </td>
          </tr>
         </tbody></table>
        <!-- #SOCIAL LINKS --->
        
         </td>
         </tr>
         </tbody></table>
        
        </div>
        <!-- #post$i -->
            
        ";
        $i = $i+1;
  }
}
else{
    echo "<center>No posts found for the current newsletter.</center>";
}
?>


<!-- instagram feed starts here -->
<h2 style='font-family:"DM Serif Display", Sans-serif;font-size:24px;color:#303133;font-weight:400;margin-bottom:15px;line-height:26px;margin-top:18px;'>
  <a href="https://www.instagram.com/eqmagazine_/" target="_blank" style="color:#303133!important;text-decoration:none;border-bottom:none!important;">
  <font color="#303133">Check out our latest posts…</font><br>
 </a>
</h2>
<!-- Place <div> tag where you want the feed to appear -->
<div id="curator-feed-default-feed-layout"><a href="https://curator.io" target="_blank" class="crt-logo crt-tag">Powered by Curator.io</a></div>
<!-- The Javascript can be moved to the end of the html page before the </body> tag -->
<script type="text/javascript">
/* curator-feed-default-feed-layout */
(function(){
var i, e, d = document, s = "script";i = d.createElement("script");i.async = 1;
i.src = "https://cdn.curator.io/published/fe188721-0054-45c2-be96-bf94f97ebcf3.js";
e = d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
})();
</script>
<!-- instagram feed ends here -->


</div>
</div>


