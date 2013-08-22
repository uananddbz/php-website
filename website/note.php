<?php
$title='notes';
 require_once("header.php"); ?>
<?php require_once('auth.php'); ?>


<script>
$(document).ready(function(){
    $("#note-form").validate({
 errorClass: "text-error",
 submitHandler: function(form) {
 data=$("#note-form").serialize();
 x=$("#note-form").serializeArray();
  $.post("ajax-insert.php",data,function(result){
  if (result=='true') {

 	form.reset();
d=new Date();
m=d.getMonth()+1;
now=d.getFullYear()+'-'+m+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();

   $("#all-note").prepend('<div id="new" class="note well well-small"><h4><span class="badge badge-inverse pull-right"><strong>'+now+'</strong></span>'+x['1'].value+'</h4><p>'+x['0'].value+'</p></div>');
	$("#all-note #new").effect("highlight",1500,function() {
	$(this).removeAttr("id");
	});
	}
	
	else {
	alert(result);
	}
  });
			}

});

$("#edit").click(function() {
$.fn.editable.defaults.emptytext = 'not set';
$.fn.editable.defaults.url = 'ajax_note.php';
$.fn.editable.defaults.mode = 'inline';
$.fn.editable.defaults.placement = 'bottom';
$.fn.editable.defaults.showbuttons = false;
$.fn.editable.defaults.onblur = 'submit';
$.fn.editable.defaults.highlight = false;
$.fn.editable.defaults.type = 'text';
$.fn.editable.defaults.error = function(response, newValue) {
$.bootstrapGrowl("<h4>error ("+response.status+")</h4><p>"+response.statusText+"</p>",{type:"error"})
};
$.fn.editable.defaults.success = function(response, newValue) {
$(this).effect("highlight","slow");
};

$('#note span').editable({
validate: function(value) {
    if($.trim(value) == '') {
        return 'This field is required';
    }
}
});
$(this).remove();
});

$("#write").hs();

});

</script>

<div class="container-fluid">


      <?php
	  
if (isset($_GET['del'])) {
$d=$_GET['del'];
$sql="DELETE FROM $database.$tbl_name WHERE $tbl_name.`index` = $d;";
if (mysql_query($sql))
  {
success ('<b>Note deleted!</b>');
  }
  else
error ('error');
}	  

if (isset($_GET['index'])) {
	$tbl_name='notes';
$index=$_GET['index'];
$sql = "SELECT * FROM $tbl_name WHERE `index` = $index";
	$result = mysql_query($sql);
	
echo '<div class="span8 offset2">';
while($row = mysql_fetch_array($result))
  {
echo '<div><a class="btn btn-large" href="note.php"> Notes</a>
<h1><span data-name="name" data-pk="'.$row['index'].'">'.$row['name'].'</span></h1>
<p class="lead well well-small"><span data-showbuttons="bottom" data-name="content" data-type="textarea" data-inputclass="span12" data-pk="'.$row['index'].'">'.strip_tags($row['content']).'</span></p></div>
<strong><a id="edit" class="btn btn-link"><i class="icon-edit"></i> edit</a><a class="btn btn-link" href="note.php?del='.$row['index'].'"><i class="icon-trash"></i> delete</a><span class="pull-right muted">- '.$row['date'].'</span></strong>';
  }

echo '</div>';
}


else {
	
echo	'<div class="page-header">
<h1>Notes</h1>
</div>  <div class="row-fluid">
  <div class="span3">
  <a class="btn btn-large" id="write" data-effect="blind" data-target="#note-form"><i class="icon-plus"></i> ADD</a>
  	<a class="pull-right btn-large btn btn-link" href="edit_note.php"><i class="icon-edit"></i> edit</a>
  </div>
    <div class="span7"><form id="note-form">
      <textarea placeholder="Description" name="content" class="input-block-level" rows="6" required></textarea>
      <div class="row-fluid">
        <div class="span8">
          <input maxlength="40" type="text" name="name" class="input-block-level" placeholder="Title" required/>
        </div>
        <div class="span4">
          <button class="pull-right btn btn-large btn-block btn-primary"><b>save</b></button></form>
        </div>
      </div>
      <br/>
      <div id="all-note">';

	$id=$_SESSION["id"];
	$tbl_name='notes';
	$adjacents = 5;
	
	$total_pages =mysql_num_rows(mysql_query("SELECT * FROM $tbl_name WHERE id='$id'"));
	
	/* Setup vars for query. */
	$targetpage = "note.php"; 	//your file name  (the name of this file)
	$limit = 6; 
	if (isset($_GET['page'])) {
	$page = $_GET['page'];
	}
	else 
	$page ='0';
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name WHERE id='$id' ORDER BY  $tbl_name.`date` DESC  LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class='pagination pagination-centered'><ul>";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href='$targetpage?page=$prev%5C%22'>Prev</a><li>";
		else
			$pagination.='<li class="disabled"><span>Prev</span></li>';	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class='active'><span>$counter</span></li>";
				else
					$pagination.= "<li><a href='$targetpage?page=$counter%5C%22'>$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active'><span>$counter</span></li>";
					else
						$pagination.= "<li><a href='$targetpage?page=$counter%5C%22'>$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<li><a href='$targetpage?page=$lpm1%5C%22'>$lpm1</a><li>";
				$pagination.= "<li><a href='$targetpage?page=$lastpage%5C%22'>$lastpage</a><li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href='$targetpage?page=1%5C%22'>1</a></li>";
				$pagination.= "<li><a href='$targetpage?page=2%5C%22'>2</a></li>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active'><span>$counter</span></li>";
					else
						$pagination.= "<li><a href='$targetpage?page=$counter%5C%22'>$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<li><a href='$targetpage?page=$lpm1%5C%22'>$lpm1</a></li>";
				$pagination.= "<li><a href='$targetpage?page=$lastpage%5C%22'>$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href='$targetpage?page=1%5C%22'>1</a></li>";
				$pagination.= "<li><a href='$targetpage?page=2%5C%22'>2</a></li>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class='active'><span>$counter</span></li>";
					else
						$pagination.= "<li><a href='$targetpage?page=$counter%5C%22'>$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href='$targetpage?page=$next%5C%22'>next</a></li>";
		else
			$pagination.= "<li class='disabled'><span>next</span></li>";
		$pagination.= "</ul></div>";		
	}
?>
      <?php

	  	$position=200;
		while($row = mysql_fetch_array($result))
		{

$content=strip_tags($row['content']); 
$tw=str_word_count($content);
if ($tw>20) {
$view = substr($content, 0, $position).' <a class="btn btn-link" onclick="$(this).next(\'.rest\').show(\'slow\');$(this).remove();"><strong>...</strong></a>'; 
$rest=substr($content, $position);
$message=$view.'<span style="display:none;" class="rest">'.$rest.'</span>';
}
else {
$message=$content;
}
	
	echo '<div class="note well well-small">
    <h4><span class="badge badge-inverse pull-right"><strong>'.$row['date'].'</strong></span>'.$row['name'].'</h4><p>'.$message.'</p></div>';
	
		}
		echo '</div>';

echo $pagination;
        
echo '		</div>
      </div>';
	  }
	  ?>
</div>
<?php require_once("footer.php"); ?>
