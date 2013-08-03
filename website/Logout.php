<?php require_once('header.php'); ?>

<?php 
session_start();
session_destroy();
header("location:login.php?au=$au");
?>
<?php require_once('footer.php'); ?>
