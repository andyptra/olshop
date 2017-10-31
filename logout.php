<?php
   session_start();
   

if(isset($_SESSION['url'])) {
   $url = $_SESSION['url']; // holds url for last page visited.
}
else {
   $url = "user.php?mod=home"; // default page for 
}

header("Location: $url"); // perform correct redirect.
   session_destroy();
   break;
?>
