<?php 

include('header.php');
include('sidebar.php');

?>

<!-- END SIDEBAR -->

<!-- BEGIN CONTENT -->

<div class="page-content-wrapper">

<div class="page-content">

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

<h4 class="modal-title">Modal title</h4>

</div>

<div class="modal-body">

Widget settings form goes here

</div>

<div class="modal-footer">

<button type="button" class="btn blue">Save changes</button>

<button type="button" class="btn default" data-dismiss="modal">Close</button>

</div>

</div>

<!-- /.modal-content -->

</div>

<!-- /.modal-dialog -->

</div>

<!-- /.modal -->

<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->



<!-- BEGIN PAGE HEADER-->

<h3 class="page-title">

Dashboard <small>dashboard & statistics</small>

</h3>

<div class="page-bar">

<ul class="page-breadcrumb">

<li>

<i class="fa fa-home"></i>

<a href="#">Home</a>

<i class="fa fa-angle-right"></i>

</li>

<li>

<a href="#">Dashboard</a>

</li>

</ul>

<div class="page-toolbar">

<div class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top">

<i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block">
<?php 
date_default_timezone_set('America/Los_Angeles');
echo date('m/d/Y h:i:s A');
?></span>&nbsp;

</div>

</div>

</div>

<!-- END PAGE HEADER-->

<!-- BEGIN DASHBOARD STATS -->

<div class="row">
<!--
<?php if($permission!='Employee'){?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<div class="dashboard-stat blue-madison">

<div class="visual">

<i class="fa fa-comments"></i>

</div>

<div class="details">

<div class="number">

<?php 

$last_logins=$zoom->select("users","name='$uname' and email='$login_mail'","last_login");

                foreach ( $last_logins as  $usr) {

                 $last_login =$usr['last_login'];

                }

            $c_comment =$zoom->get_field('comments',"cdate>'$last_login'",'count(*)');

            echo $c_comment;

            ?>

</div>

<div class="desc">

 Comments

</div>

</div>

 <a class="more" href="#">

View more <i class="m-icon-swapright m-icon-white"></i>

</a> 

</div>

</div>-->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<div class="dashboard-stat red-intense">

<div class="visual">

<i class="fa fa-bar-chart-o"></i>

</div>

<div class="details">

<div class="number">

<?php 
/*$c_project =$zoom->get_field('projects',"date>'$last_login' and status='1'",'count(*)');
*/$c_project =$zoom->get_field('projects',"status='0'",'count(*)');

            echo $c_project;

            ?>

</div>

<div class="desc">

Total Projects

</div>

</div>

<!-- <a class="more" href="#">

View more <i class="m-icon-swapright m-icon-white"></i>

</a> -->

</div>

</div>
<?php }?>
<?php if($zoom->is_admin()){?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<div class="dashboard-stat green-haze">

<div class="visual">

<i class="fa fa-shopping-cart"></i>

</div>

<div class="details">

<div class="number">

<?php $c_app =$zoom->get_field('new_application',"date>'$last_login'",'count(*)');

            echo $c_app;

            ?>  </div>

<div class="desc">

New Appliactions

</div>

</div>

<!-- <a class="more" href="#">

View more <i class="m-icon-swapright m-icon-white"></i>

</a> -->

</div>

</div>
<?php }?>
<?php if($permission!='vendor'){?>
<!--
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

<div class="dashboard-stat purple-plum">

<div class="visual">

<i class="fa fa-globe"></i>

</div>

<div class="details">

<div class="number">

<?php $c_news =$zoom->get_field('news',"date>'$last_login'",'count(*)');

            echo $c_news;

            ?></div>

<div class="desc">

Latest News

</div>

</div>

<a class="more" href="#">

View more <i class="m-icon-swapright m-icon-white"></i>

</a> 

</div>

</div>
<?php }?>
</div>
-->
<!-- END DASHBOARD STATS -->

<div class="clearfix">

</div>

<div class="row">
<?php if(!in_array($permission,array('Employee','vendor'))){?>
<div class="col-md-6 col-sm-6">

<!-- BEGIN PORTLET-->

<div class="portlet box blue-steel">



<div class="portlet-title line">

<div class="caption">

<i class="fa fa-comments"></i>Comments





</div>



</div>

<div class="portlet-body" id="chats">

<div class="scroller" style="height: 328px;overflow-y:scroll;" data-always-visible="1" data-rail-visible1="1">

<ul class="chats">

<?php 

                            $pname=basename(dirname(__FILE__));

                            $comments= $zoom->all("comments","*","5");

                              $in_out=1;    

                            foreach ($comments as $comment) {
                                        $p_id=$comment['project_id'];
                            $project_id=explode('JPRO00',$comment['project_id']);

                            $authid=$comment['author_id'];
                           if($authid==1){$author_img =$zoom->select('admin_details',"user_id='$authid'",'image_url') ;}
                      else{$author_img =$zoom->select('vendors',"user_id='$authid'",'image_url') ;}
                                                           

                             foreach ($author_img as $auth_img ){  $c_img=$auth_img['image_url'];} ?>  

<li <?php if($in_out%2==0){echo 'class="out"';}else {echo 'class="in"';} ?>>
<img class="avatar" alt="" src="<?php echo $c_img;?>"/>

<div class="message">

<span class="arrow">

</span>

<span class="name">

 <?php echo ucfirst($comment['author_name']);?> </span>

<span class="datetime">

at <?php echo date('m/d/Y h:i A',strtotime($comment['cdate']));?> </span>
</br>
<span style="font-weight:bold;">Project: </span>
<a href="view-project.php?page=<?php echo $project_id[1];?>" class="name">
<?php $ptitle= $zoom->get_field('projects',"project_id='$p_id'",'title');echo str_replace("~","'",ucfirst($ptitle));?>
</a>
</br>
<span class="body">
<?php echo str_replace("~","'",strip_tags($zoom->excerpt($comment['description'],'100')));?> </span>

</div>

</li>

 <?php 

$in_out++;

}

?>

</ul>

</div>

</div>

</div>

<!-- END PORTLET-->

</div>
<?php }?>
<?php if($permission!='vendor'){?>
<div class="col-md-6 col-sm-6">

<!-- BEGIN PORTLET-->

<div class="portlet box blue-steel">

<div class="portlet-title">

<div class="caption">

<i class="fa fa-bell-o"></i>Recent News

</div>



</div>

<div class="portlet-body">

<div class="scroller" style="height: 328px;overflow-y:scroll;" data-always-visible="1" data-rail-visible="0">

<ul class="feeds">

<?php 

                            $pname=basename(dirname(__FILE__));

                            $news= $zoom->all("news","*","5");

                            foreach ($news as $news) {

                            ?>  



<li>

<a href="view-news.php?page=<?php echo $news['id'];?>">

<div class="col1">

<div class="cont">

<div class="cont-col1">

<div class="label label-sm label-default">

<i class="fa fa-bell-o"></i>

</div>

</div>

<div class="cont-col2">

<div class="desc">

<?php echo str_replace("~","'",strip_tags($zoom->excerpt($news['title'],'660')));?>

</div>

</div>

</div>

</div>

<div class="col2">

<div class="date">

<?php echo date('m/d/Y h:i:s A',strtotime($news['date']));?>

</div>

</div>

</a>

</li>

<?php 

 }

?>



</ul>

</div>

<div class="scroller-footer">

<div class="btn-arrow-link pull-right">
<!-- 
<a href="#">See All Records</a>

<i class="icon-arrow-right"></i>
 -->
</div>

</div>

</div>

</div>

<!-- END PORTLET-->

</div>
<?php }?>
<?php if($permission=='vendor'){?>
<div class="col-md-6 col-sm-6">

<!-- BEGIN PORTLET-->

<div class="portlet box blue-steel">

<div class="portlet-title">

<div class="caption">

<i class="fa fa-bell-o"></i>Latest Projects

</div>



</div>

<div class="portlet-body">

<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">

<ul class="feeds">

<?php 

                            $pname=basename(dirname(__FILE__));

                            $pros= $zoom->all("projects","*","5");

                            foreach ($pros as $pro) {

                            ?>  



<li>

<a href="<?php echo "http://".$_SERVER['HTTP_HOST'].'/'.$pname; ?>/view-project.php?page=<?php echo $pro['id'];?>">

<div class="col1">

<div class="cont">

<div class="cont-col1">

<div class="label label-sm label-default">

<i class="fa fa-bell-o"></i>

</div>

</div>

<div class="cont-col2">

<div class="desc">

<?php echo str_replace("~","'",strip_tags($zoom->excerpt($pro['description'],'100')));?>

</div>

</div>

</div>

</div>

<div class="col2">

<div class="date">

<?php echo date('m/d/Y D h:i:s A',strtotime($pro['date']));?>

</div>

</div>

</a>

</li>

<?php 

 }

?>



</ul>

</div>

<div class="scroller-footer">

<div class="btn-arrow-link pull-right">

<!-- <a href="#">See All Records</a>

<i class="icon-arrow-right"></i>
 -->
</div>

</div>

</div>

</div>

<!-- END PORTLET-->

</div>
<?php }?>

</div>

<div class="clearfix">

</div>
<!--
<div class="row ">

<div class="col-md-6 col-sm-6">

<div class="portlet solid bordered grey-cararra">

<div class="portlet-title">

<div class="caption">

<i class="fa fa-bar-chart-o"></i>Site Visits

</div>

<div class="actions">

<div class="btn-group" data-toggle="buttons">

<label class="btn grey-steel btn-sm active">

<input type="radio" name="options" class="toggle" id="option1">New</label>

<label class="btn grey-steel btn-sm">

<input type="radio" name="options" class="toggle" id="option2">Returning</label>

</div>

</div>

</div>

<div class="portlet-body">

<div id="site_statistics_loading">

<img src="assets/admin/layout/img/loading.gif" alt="loading"/>

</div>


<div id="site_statistics_content" class="display-none">

<div id="site_statistics" class="chart">

</div>

</div>

</div>


</div>

</div>

<div class="col-md-6 col-sm-6">

<div class="portlet box purple-wisteria">

<div class="portlet-title">

<div class="caption">

<i class="fa fa-calendar"></i>General Stats

</div>

<div class="actions">

<a href="javascript:;" class="btn btn-sm btn-default easy-pie-chart-reload">

<i class="fa fa-repeat"></i> Reload </a>

</div>

</div>

<div class="portlet-body">

<div class="row">

<div class="col-md-4">

<div class="easy-pie-chart">

<div class="number transactions" data-percent="55">

<span>

+55 </span>

%

</div>

<a class="title" href="#">

Transactions <i class="icon-arrow-right"></i>

</a>

</div>

</div>

<div class="margin-bottom-10 visible-sm">

</div>

<div class="col-md-4">

<div class="easy-pie-chart">

<div class="number visits" data-percent="85">

<span>

+85 </span>

%

</div>

<a class="title" href="#">

New Visits <i class="icon-arrow-right"></i>

</a>

</div>

</div>

<div class="margin-bottom-10 visible-sm">

</div>

<div class="col-md-4">

<div class="easy-pie-chart">

<div class="number bounce" data-percent="46">

<span>

-46 </span>

%

</div>

<a class="title" href="#">

Bounce <i class="icon-arrow-right"></i>

</a>

</div>

</div>

</div>

</div>

</div>

<div class="portlet box red-sunglo">

<div class="portlet-title">

<div class="caption">

<i class="fa fa-calendar"></i>Server Stats

</div>

<div class="tools">

<a href="" class="collapse">

</a>

<a href="#portlet-config" data-toggle="modal" class="config">

</a>

<a href="" class="reload">

</a>

<a href="" class="remove">

</a>

</div>

</div>

<div class="portlet-body">

<div class="row">

<div class="col-md-4">

<div class="sparkline-chart">

<div class="number" id="sparkline_bar">

</div>

<a class="title" href="#">

Network <i class="icon-arrow-right"></i>

</a>

</div>

</div>

<div class="margin-bottom-10 visible-sm">

</div>

<div class="col-md-4">

<div class="sparkline-chart">

<div class="number" id="sparkline_bar2">

</div>

<a class="title" href="#">

CPU Load <i class="icon-arrow-right"></i>

</a>

</div>

</div>

<div class="margin-bottom-10 visible-sm">

</div>

<div class="col-md-4">

<div class="sparkline-chart">

<div class="number" id="sparkline_line">

</div>

<a class="title" href="#">

Load Rate <i class="icon-arrow-right"></i>

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<div class="clearfix">

</div>-->



</div>

</div>

<!-- END CONTENT -->

<!-- BEGIN QUICK SIDEBAR -->

<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>

<div class="page-quick-sidebar-wrapper">

<div class="page-quick-sidebar">

<div class="nav-justified">

<ul class="nav nav-tabs nav-justified">

<li class="active">

<a href="#quick_sidebar_tab_1" data-toggle="tab">

Users <span class="badge badge-danger">2</span>

</a>

</li>

</ul>

</li>

</ul>

<div class="tab-content">

<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">

<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" >

<h3 class="list-heading">Staff</h3>

<ul class="media-list list-items">

<li class="media">

<div class="media-status">

<span class="badge badge-success">8</span>

</div>
<!--
<img class="media-object" src="assets/admin/layout/img/avatar3.jpg" alt="...">
-->
<div class="media-body">

<h4 class="media-heading">Bob Nilson</h4>

<div class="media-heading-sub">

Project Manager

</div>

</div>

</li>



</ul>

<h3 class="list-heading">Customers</h3>

<ul class="media-list list-items">

<li class="media">

<div class="media-status">

<span class="badge badge-warning">2</span>

</div>
<!--
<img class="media-object" src="assets/admin/layout/img/avatar6.jpg" alt="...">
-->
<div class="media-body">

<h4 class="media-heading">Lara Kunis</h4>

<div class="media-heading-sub">

CEO, Loop Inc

</div>

<div class="media-heading-small">

Last seen 03:10 AM

</div>

</div>

</li>



</ul>

</div>



</div>



</div>

</div>

</div>

</div>

<!-- END QUICK SIDEBAR -->

</div>

<!-- END CONTAINER -->

<?php

include('main-footer.php');

?>