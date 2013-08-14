<?php $title='Contacts';?>
<?php require_once('header.php'); ?>
<?php require_once('auth.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $("#loader").ajaxl("#target","<b>Loading...</b>");
});
</script>


<div class="container-fluid">

  <div class="page-header">
    <h1>Contacts <small>to contact</small></h1>
  </div>
  
  <ul id="loader" class="nav nav-my nav-tabs">
    <li class="active"> <a title="HOME" href="view_contacts.php"><i class="icon-home"></i></a> </li>
  <li><a title="ADD" href="add_contacts.php"><i class="icon-plus"></i></a></li>
    <li><a title="DELETE" href="edit_contacts.php"><i class="icon-trash"></i></a></li>
  </ul>
  
  <div id="target" class="container-fluid" style="border-bottom:1px solid #ddd;">

</div>

</div>

</div>
<?php require_once('footer.php'); ?>
