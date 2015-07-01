<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>


<!-- Main content -->
<section class="content">
<?php $user_id=$_SESSION['user_id'];
$profile_id=base64_decode($_GET['profile_id']);
$profile_name=$posts->get_field('article_profiles',"profile_id=$profile_id",'profile_title');
?>
<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Queued Posts for '<?php echo $profile_name;?>' Profile</h3>

</div>
<div class="box-body">
<?php 
 $projects=$posts->select('queueposts',"profile_id='$profile_id'",'*','user_id'); 
  if(empty($projects)):
  require('../api/postlinks_api/GetQueuedPost.php');

 foreach ($result as $pros):
  $keys=array_keys($pros);
  array_push($keys,"addeddate");
  array_push($keys,"user_id");
  $value=array_values($pros);
  array_push($value,date('y-m-d H:i:s'));
  array_push($value,$user_id);
 foreach ($value as $key => $value) {
 	$value =str_replace("'", "~", $value);
   $values[]="'".$value."'";
   }

$insert_id[]=$posts->insert('queueposts',$keys,$values);
unset($values) ;
unset($keys) ;

endforeach;

 elseif(empty($insert_id)):
  ?>  
<?php
endif;
?>
<table width="949" cellpadding="8" cellspacing="0">
<tbody><tr>
<td style="padding-bottom: 10px" colspan="10">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody><tr>
<td>  
<font class="small">

</font>&nbsp;
</td>
</tr>
</tbody></table>
</td></tr><tr>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px">Article</td>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px">Queued</td>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px"><a href="#">Date Created</a></td>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px"><a href="#">Min. PR/DA</a></td>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px"><a href="#">Max. PR/DA</a></td>
<!-- <td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px"><a href="#">Queued posts</a></td> -->
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px"><a href="#">Existing posts</a></td>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px"><a href="#">Credits Used</a></td>
<td bgcolor="#FAFAFA" class="asmallgr" style="padding: 5px">&nbsp;</td>
</tr>
<?php 

$article_ids=$posts->select('articals',"user_id='$user_id' and profile_id ='$profile_id'",'article_title,article_id','article_id'); 
foreach ($article_ids as $artical):
$aid=$artical['article_id'];
$queue_post=$posts->select('queueposts',"article_id ='$aid'",'*','article_id'); 
?>
<?php if(!empty($queue_post)):?>
<tr><td colspan="9"><strong><?php echo  substr($artical['article_title'],0,100); ?></strong></td></tr>
<tr><td>&nbsp;</td></tr>
<?php endif;?>
<?php
foreach ($queue_post as $key => $value):
?> 
<tr>
<td class="DataTD"><div class="small" style="font-size:x-small;">Active</div></td>
<td class="DataTD"><div class="small" style="font-size:x-small;"><?php if($value['posts_per_period']!=0):echo $value['posts_per_period'];?> posts each day<?php else: ?>all-at-once<?php endif;?></div></td>
<td class="DataTD"><div class="small" style="font-size:x-small;"><?php echo $value['addeddate'];?></div></td>
<td class="DataTD"><div class="small" style="font-size:x-small;">PR <?php echo $value['min_pr'];?></div></td>
<td class="DataTD"><div class="small" style="font-size:x-small;">PR <?php echo $value['max_pr'];?></div></td>
<!-- <td class="DataTD"><div class="small" style="font-size:x-small;"><?php echo $value['posts_queued'];?></div></td> -->
<td class="DataTD"><div class="small" style="font-size:x-small;"><?php echo $value['exist_posts'];?></div></td>
<td class="DataTD"><div class="small" style="font-size:x-small;"><?php $posts->credit_used($value['min_pr'],$value['exist_posts']); ?></div></td>
</tr>
<tr><td>&nbsp;</td></tr>
<?php endforeach;?>
<?php endforeach;?>
</table>
</div><!-- /.box-body -->

</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include('footer.php');?>
