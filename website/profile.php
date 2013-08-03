<?php $title='Profile';?>
<?php require_once('header.php'); ?>

<?php require_once('auth.php'); ?>
<div class="container-fluid">

<table class="table table-striped table-bordered">

  <tr>
    <th scope="row">NAME:</th>
    <td><?=$_SESSION['name']?></td>
  </tr>
  <tr>
    <th scope="row">EMAIL:</th>
    <td><?=$_SESSION['email']?></td>
  </tr>
  <tr>
    <th scope="row">COUNTRY:</th>
    <td><?=$_SESSION['country']?></td>
  </tr>
  <tr>
    <th scope="row">GENDER:</th>
    <td><?=$_SESSION['gender']?></td>
  </tr>
    <tr>
    <th scope="row">DATE OF BIRTH:</th>
    <td><?=$_SESSION['dob']?>
  <i data-placement="right" title="<?=prettyDate($_SESSION['dob'])?>" class="icon-info-sign"></i>
	</td>
  </tr>
</table>
</div>
<?php require_once('footer.php'); ?>
