<?php
if(!$_SESSION['username']){
header("location:login.php?link=$url");
}
?>
