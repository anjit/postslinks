<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>
<?php $user_id=$_SESSION['user_id'];?>
<link rel="stylesheet" type="text/css" href="css/font.css" />
<link rel="stylesheet" type="text/css" href="css/picedit.css" />
<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Profile</h3>

</div>
<div class="box-body">
<div class="content animate-panel">

<div class="row">
<div class="col-lg-4 animated-panel zoomIn" style="animation-delay: 0.1s; -webkit-animation-delay: 0.1s;">
<div class="hpanel hgreen">
<div class="panel-body">
<div class="pull-right text-right">
<div class="btn-group">
<i class="fa fa-facebook btn btn-default btn-xs"></i>
<i class="fa fa-twitter btn btn-default btn-xs"></i>
<i class="fa fa-linkedin btn btn-default btn-xs"></i>
</div>
</div>

<div>
<img src="<?php echo $_SESSION['user_img'];?>">
</div>




<h3><a href=""><?php echo $_SESSION['username']; ?></a></h3>
<div class="text-muted font-bold m-b-xs">California, LA</div>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.
</p>
<div class="progress m-t-xs full progress-small">
<div style="width: 65%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class=" progress-bar progress-bar-success">
<span class="sr-only">35% Complete (success)</span>
</div>
</div>
</div>
<div class="border-right border-left">
</div>

<div class="panel-footer contact-footer">
<div class="row">
<div class="col-md-4 border-right animated-panel zoomIn" style="animation-delay: 0.2s; -webkit-animation-delay: 0.2s;">
<div class="contact-stat"><span>Projects Folders: </span> <strong><?php echo $posts->get_field('project_folder',"user_id='$user_id'",'count(*)');?></strong></div>
</div>
<div class="col-md-4 border-right animated-panel zoomIn" style="animation-delay: 0.2s; -webkit-animation-delay: 0.2s;">
<div class="contact-stat"><span>Article Profile: </span> <strong><?php echo $posts->get_field('article_profiles',"user_id='$user_id'",'count(*)');?></strong></div>
</div>
<div class="col-md-4 animated-panel zoomIn" style="animation-delay: 0.3s; -webkit-animation-delay: 0.3s;">
<div class="contact-stat"><span>Link Profiles: </span> <strong><?php echo $posts->get_field('link_profiles',"user_id='$user_id'",'count(*)');?></strong></div>
</div>
</div>
</div>

</div>
</div>
<div class="col-lg-8 animated-panel zoomIn" style="animation-delay: 0.4s; -webkit-animation-delay: 0.4s;">
<div class="hpanel">
<div class="hpanel">

<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Account Snapshot</a></li>
<li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Messages</a></li>
<li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Account Options</a></li>
</ul>
<div class="tab-content">
<div id="tab-1" class="tab-pane active">
<div class="panel-body">
<strong>Advertiser Account Overview</strong>

<!-- <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
existence in this spot, which was created for the bliss of souls like mine.</p> -->

<div class="table-responsive">
<table class="table">
<tbody>
<tr class="bg-primary"><td>Number of Credits (available/used)</td><td><?php  
$credits=$posts->select('credits_records',"user_id='$user_id'",'credits,level','id');
$level=$credits[0][level];
$credit_value=$posts->get_field('member_plan',"id='$level'",'credits');
?><?echo $credits[0][credits];?> / <?=$credit_value;?>  Upgrade My Membership</td></tr>
<tr class="bg-info"><td>Article Posts (completed posts/credits used)</td><td> 1618 posts / 5786 credits</td></tr>
<tr class="bg-success"><td>Contextual Links (links/credits used)</td><td>0 links / 0 credits</td></tr>
<tr class="bg-warning"><td>Comment Links (links/credits used)</td><td>0 links / 0 credits</td></tr>
<tr class="bg-danger"><td>Outsourced Article Account (available/used)</td><td>$0 / $0 Add Outsourced Article Funds Article Outsourcing Video Tutorial</td></tr>	
</tbody>
</table>
</div>
</div>
</div>
<div id="tab-2" class="tab-pane">
<div class="panel-body">


<div class="chat-discussion">
<div class="chat-message">
<img class="message-avatar" src="images/a5.png" alt="">
<div class="message">
<a class="message-author" href="#"> Alice Jordan </a>
<span class="message-date">  Fri Jan 25 2015 - 11:12:36 </span>
<span class="message-content">
All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
It uses a dictionary of over 200 Latin words.
</span>
<div class="m-t-md">
<a class="btn btn-xs btn-default"><i class="fa fa-thumbs-up"></i> Like </a>
<a class="btn btn-xs btn-default"><i class="fa fa-heart"></i> Love</a>
</div>
</div>
</div>
</div>
</div>
</div>

<div id="tab-3" class="tab-pane">
<div class="panel-body">
<?php $details=$posts->select('users',"user_id='$user_id'",'*','user_id');
foreach ($details as $key => $value):
?>
<form action="#" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="exampleInputEmail1">First Name</label>
<input type="text" class="form-control" id="exampleInputname" value="<?=$value['username'];?>" readonly name="username" placeholder="First Name">
</div>
<div class="form-group">
<label for="exampleInputEmail1">First Name</label>
<input type="text" class="form-control" id="exampleInputname" value="<?=$value['first_name'];?>"name="first_name" placeholder="First Name">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Last Name</label>
<input type="text" class="form-control" id="exampleInputLastname" value="<?=$value['last_name'];?>" name="last_name" placeholder="Last Name">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?=$value['email'];?>" placeholder="Email">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Phone Number</label>
<input type="tel" class="form-control" id="exampleInputEmail1" name="phone_no" value="<?=$value['phone_no'];?>" placeholder="Phone Number">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" readonly value="<?=$value['username'];?>" placeholder="Password">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Profile Image</label>
<input type="file" class="form-control" accept="image/*" id="exampleInputfile" name="url" value="<?=$value['image'];?>" placeholder="Profile Image">
</div>

<button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
<?php endforeach; ?>
<h3>Set Up Low Credit Alert</h3>
<hr>
<p>Before you get started, we recommend that you set an alert so that you don't accidentally run out of credits while you and/or your users are creating links.</p>
<form class="form-inline">
<div class="checkbox">
<label>
<input type="checkbox">Send an email to lcgc@whitelistwebdesign.com when my account is below
</label>
</div>
<div class="form-group">
<input type="text" class="form-control" id="exampleInputcredits" placeholder="credits">
<label for="exampleInputEmail2">credits</label>
</div>
<input type="submit" name="submit" value="submit" class="btn btn-default">
</form>
</div>
</div>



</div>


</div>
</div>
</div>
</div>

</div>
</div><!-- /.box-body -->

</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include('main-footer.php');?>
<script type="text/javascript" src="js/picedit.js"></script>
<script type="text/javascript">
	$(function() {
		$('.picedit_box').picEdit({
			imageUpdated: function(img){
			},
			formSubmitted: function(){
			},

			redirectUrl: false,
            defaultImage: false
		});
	});
</script>
<?php
if(isset($_POST['submit'])):
$url=$posts->image_upload();	
$_POST[image]=$url;
print_r($_POST);
foreach ($_POST as $key => $value):
$posts->update('users',"user_id=$user_id","$key","'$value'");
endforeach;
unset($_SESSION['user_img']);
$_SESSION['user_img']=$url;
header("location:Profile");
endif;	
?>