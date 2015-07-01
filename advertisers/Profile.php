<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>
<link rel="stylesheet" type="text/css" href="css/font.css" />
<link rel="stylesheet" type="text/css" href="css/picedit.css" />
<style type="text/css">
.picedit_canvas_box
{
background-image: url('<?php echo $_SESSION['user_img'];?>');
background-size: cover;
}

</style>
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

<!-- image area -->
<!-- <img alt="logo" class="img-circle m-b m-t-md" src="images/user-icon.png">
 -->
<form name="testform" action="out" method="post" enctype="multipart/form-data">
<!-- begin_picedit_box -->
<div class="picedit_box">
<!-- Placeholder for messaging -->
<div class="picedit_message">
<span class="picedit_control ico-picedit-close" data-action="hide_messagebox"></span>
<div></div>
</div>
<!-- Picedit navigation -->
<div class="picedit_nav_box picedit_gray_gradient">
<div class="picedit_pos_elements"></div>
<div class="picedit_nav_elements">
<!-- Picedit button element begin -->
<div class="picedit_element">
<span class="picedit_control picedit_action ico-picedit-pencil" title="Pen Tool"></span>
<div class="picedit_control_menu">
<div class="picedit_control_menu_container picedit_tooltip picedit_elm_3">
<label class="picedit_colors">
<span title="Black" class="picedit_control picedit_action picedit_black active" data-action="toggle_button" data-variable="pen_color" data-value="black"></span>
<span title="Red" class="picedit_control picedit_action picedit_red" data-action="toggle_button" data-variable="pen_color" data-value="red"></span>
<span title="Green" class="picedit_control picedit_action picedit_green" data-action="toggle_button" data-variable="pen_color" data-value="green"></span>
</label>
<label>
<span class="picedit_separator"></span>
</label>
<label class="picedit_sizes">
<span title="Large" class="picedit_control picedit_action picedit_large" data-action="toggle_button" data-variable="pen_size" data-value="16"></span>
<span title="Medium" class="picedit_control picedit_action picedit_medium" data-action="toggle_button" data-variable="pen_size" data-value="8"></span>
<span title="Small" class="picedit_control picedit_action picedit_small" data-action="toggle_button" data-variable="pen_size" data-value="3"></span>
</label>
</div>
</div>
</div>
<!-- Picedit button element end -->
<!-- Picedit button element begin -->
<div class="picedit_element">
<span class="picedit_control picedit_action ico-picedit-insertpicture" title="Crop" data-action="crop_open"></span>
</div>
<!-- Picedit button element end -->
<!-- Picedit button element begin -->
<div class="picedit_element">
<span class="picedit_control picedit_action ico-picedit-redo" title="Rotate"></span>
<div class="picedit_control_menu">
<div class="picedit_control_menu_container picedit_tooltip picedit_elm_1">
<label>
<span>90° CW</span>
<span class="picedit_control picedit_action ico-picedit-redo" data-action="rotate_cw"></span>
</label>
<label>
<span>90° CCW</span>
<span class="picedit_control picedit_action ico-picedit-undo" data-action="rotate_ccw"></span>
</label>
</div>
</div>
</div>
<!-- Picedit button element end -->
<!-- Picedit button element begin -->
<div class="picedit_element">
<span class="picedit_control picedit_action ico-picedit-arrow-maximise" title="Resize"></span>
<div class="picedit_control_menu">
<div class="picedit_control_menu_container picedit_tooltip picedit_elm_2">
<label>
<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="resize_image"></span>
<span class="picedit_control picedit_action ico-picedit-close" data-action=""></span>
</label>
<label>
<span>Width (px)</span>
<input type="text" class="picedit_input" data-variable="resize_width" value="0">
</label>
<label class="picedit_nomargin">
<span class="picedit_control ico-picedit-link" data-action="toggle_button" data-variable="resize_proportions"></span>
</label>
<label>
<span>Height (px)</span>
<input type="text" class="picedit_input" data-variable="resize_height" value="0">
</label>
</div>
</div>
</div>
<!-- Picedit button element end -->
</div>
</div>
<!-- Picedit canvas element -->
<div class="picedit_canvas_box">
<div class="picedit_painter">
<canvas></canvas>
</div>
<div class="picedit_canvas">
<canvas></canvas>
</div>
<div class="picedit_action_btns active">
<div class="picedit_control ico-picedit-picture" data-action="load_image"></div>
<div class="picedit_control ico-picedit-camera" data-action="camera_open"></div>
<div class="center">or copy/paste image here</div>
</div>
</div>
<!-- Picedit Video Box -->
<div class="picedit_video">
<video autoplay></video>
<div class="picedit_video_controls">
<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="take_photo"></span>
<span class="picedit_control picedit_action ico-picedit-close" data-action="camera_close"></span>
</div>
</div>
<!-- Picedit draggable and resizeable div to outline cropping boundaries -->
<div class="picedit_drag_resize">
<div class="picedit_drag_resize_canvas"></div>
<div class="picedit_drag_resize_box">
<div class="picedit_drag_resize_box_corner_wrap">
<div class="picedit_drag_resize_box_corner"></div>
</div>
<div class="picedit_drag_resize_box_elements">
<span class="picedit_control picedit_action ico-picedit-checkmark" data-action="crop_image"></span>
<span class="picedit_control picedit_action ico-picedit-close" data-action="crop_close"></span>
</div>
</div>
</div>
</div>
<!-- end_picedit_box -->
<div style="margin-top:10px; text-align: center;">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>

<!-- end of image area -->







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
<div class="contact-stat"><span>Projects: </span> <strong>200</strong></div>
</div>
<div class="col-md-4 border-right animated-panel zoomIn" style="animation-delay: 0.2s; -webkit-animation-delay: 0.2s;">
<div class="contact-stat"><span>Messages: </span> <strong>300</strong></div>
</div>
<div class="col-md-4 animated-panel zoomIn" style="animation-delay: 0.3s; -webkit-animation-delay: 0.3s;">
<div class="contact-stat"><span>Views: </span> <strong>400</strong></div>
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
<strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
existence in this spot, which was created for the bliss of souls like mine.</p>

<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>

<th>#</th>
<th>Project </th>
<th>Name </th>
<th>Phone </th>
<th>Company </th>
<th>Completed </th>
<th>Task</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<tr>
<td>4</td>
<td>Gamma project</td>
<td>Anna Jordan</td>
<td>(016977) 0648</td>
<td>Tellus Ltd</td>
<td><span class="pie" style="display: none;">10/50</span><svg class="peity" height="16" width="16"><path d="M 8 0 A 8 8 0 0 1 15.60845213036123 5.52786404500042 L 8 8" fill="#62cb31"></path><path d="M 15.60845213036123 5.52786404500042 A 8 8 0 1 1 7.999999999999998 0 L 8 8" fill="#edf0f5"></path></svg></td>
<td>18%</td>
<td>Jul 22, 2013</td>
<td><a href="#"><i class="fa fa-check text-success"></i></a></td>
</tr>
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
