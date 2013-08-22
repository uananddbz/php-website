<?php
$title='edit-profile';
$nav='<ul class="nav pull-right"><li class="active"><a>Click on detail you want to edit</a></li></ul>';
 require_once("header.php"); ?>
<?php
$tbl='contacts';
$id=$_SESSION["id"];
?>
<script type="text/javascript">
$(document).ready(function(){
$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.emptytext = 'not set';
$.fn.editable.defaults.url = 'ajax_update.php';
$.fn.editable.defaults.pk = 1;
$.fn.editable.defaults.showbuttons = false;
$.fn.editable.defaults.onblur = 'submit';
$.fn.editable.defaults.highlight = false;
$.fn.editable.defaults.type = 'text';
$.fn.editable.defaults.error = function(response, newValue) {
$.bootstrapGrowl("<h4>error ("+response.status+")</h4><p>"+response.statusText+"</p>",{type:"error"})
};
$.fn.editable.defaults.success = function(response, newValue) {
$(this).parent("td").parent("tr").effect("highlight","slow");
$.bootstrapGrowl("<b>updated successfully!</b>",{type:"success"})
};

$('#name').editable();

$('#email').editable({
    type: 'email'
});

$('#country').editable();

$('#gender').editable({
    type: 'select',
	value: 1,    
        source: [
              {value: 'male', text: 'male'},
              {value: 'female', text: 'female'}
           ]
});

$('#dob').editable({
    type: 'date',
	format: 'yyyy-mm-dd',    
        viewformat: 'dd/mm/yyyy',    
        datepicker: {
                weekStart: 1
           }
});


});
</script>

<div class="container-fluid">
  <div class="page-header">
    <h1>Profile <small> - <?=$_SESSION["username"]?></small></h1>
  </div>
  <table class="table table-bordered table-hover">
    <?php
echo '<tr><th scope="row">NAME:</th><td><a id="name">'.$_SESSION["name"].'</a></td></tr><tr><th scope="row">EMAIL:</th><td><a id="email">'.$_SESSION['email'].'</a></td></tr><tr><th scope="row">COUNTRY:</th><td><a id="country">'.$_SESSION['country'].'</a></td></tr><tr><th scope="row">GENDER:</th><td><a id="gender">'.$_SESSION['gender'].'</a></td></tr><tr><th scope="row">DATE OF BIRTH:</th><td><a data-viewformat="yyyy-mm-dd" id="dob">';
if ($_SESSION['dob']=='0000-00-00') {
echo '';
}
else {
echo $_SESSION['dob'];
}
echo'</a></td></tr>';

?>
  </table>
</div>
<?php require_once("footer.php"); ?>
