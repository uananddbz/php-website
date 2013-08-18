<?php $title='Contacts';?>
<?php require_once('header.php'); ?>
<?php require_once('auth.php'); ?>
<script type="text/javascript">
$(document).ready(function(){



r={ to: ".icon-trash", className: "r" };
b={ to: ".icon-trash", className: "b" };
  $(".da").click(function(){
  
 $.ajax({url:"ajax_del.php?da=1", success:function(){
     $(".contacts").effect( 'transfer',r, 'slow');
     $(".contacts").fadeOut("fast");
  },error:function(xhr,status,error){
    alert("An error occured: " + xhr.status + " " + xhr.statusText);
  }
  
  });
  
  
  });
  
   $(".ds").click(function(){
   c=$(this).parents(".r");
   txt=$(this).val();
   
    $.ajax({url:"ajax_del.php",data:{del:txt},type:"GET", success:function(){
  c.effect( 'transfer',b, 'normal');
  c.fadeOut("fast");
  },error:function(xhr,status,error){
    alert("An error occured: " + xhr.status + " " + xhr.statusText);
  }
  
  });

  
  

  });
  
  


  
  
});
</script>


<style>
.b { border: 2px dotted black; }
.r { border: 2px dotted red; }
</style>


<div class="container-fluid">

  <div class="page-header">
    <h1>Contacts <small>delete contacts</small></h1>
  </div>




      <?php
$tbl='contacts';
$id=$_SESSION["id"];
?>

	  <div class="contacts">
      <?php
//to display contacts

$sql="SELECT * FROM $tbl WHERE id='$id'";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
	  echo '<table class="table table-bordered table-striped"><thead><tr><th>First-name</th><th>Last-name</th><th>Number</th><th><a class="btn btn-block btn-danger da t" title="Delete all contacts"><i class="icon-trash icon-white"></i> Empty</a></th></tr></thead><tbody class="new">';
while($row = mysql_fetch_array($result))
  {
	echo '<tr class="r"><td>'.$row['fname'].'</td><td>'.$row['lname'].'</td><td>'.$row['number'].'</td><td><button data-placement="right" title="Delete" class="btn btn-inverse ds" value="'.$row['index'].'"> <i class="icon-remove icon-white"></i></button></td></tr>';
  }
  	echo '</tbody></table>';
  }
  else 
  echo '<p class="muted">no contacts</p>';
?>
</div>


</div>
<?php require_once('footer.php'); ?>
