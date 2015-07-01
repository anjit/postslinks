<?php include('header.php');?>

<?php include('sidebar.php');?>

<?php include('bredcum.php');?>
<?php 
$user_id=$_SESSION['user_id'];
?>


<!-- Main content -->

<section class="content">

<!-- Info boxes -->

<div class="row">

<div class="col-md-3 col-sm-6 col-xs-12">

<div class="info-box">

<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Project Folders</span>

<span class="info-box-number"><?php $pf_number=$posts->select('project_folder',"user_id='$user_id'",'count(*) as count','folder_id');print_r($pf_number[0]['count']); ?></span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

</div><!-- /.col -->

<div class="col-md-3 col-sm-6 col-xs-12">

<div class="info-box">

<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

<div class="info-box-content">

<span class="info-box-text">Article Profiles</span>

<span class="info-box-number"><?php $pf_number=$posts->select('article_profiles',"user_id='$user_id'",'count(*) as count','profile_id');print_r($pf_number[0]['count']); ?></span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

</div><!-- /.col -->



<!-- fix for small devices only -->

<div class="clearfix visible-sm-block"></div>



<div class="col-md-3 col-sm-6 col-xs-12">

<div class="info-box">

<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Link Profiles</span>

<span class="info-box-number"><?php $pf_number=$posts->select('link_profiles',"user_id='$user_id'",'count(*) as count','id');print_r($pf_number[0]['count']); ?></span>
</span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

</div><!-- /.col -->

<div class="col-md-3 col-sm-6 col-xs-12">

<div class="info-box">

<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Affiliate Account</span>

<span class="info-box-number">2,000</span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

</div><!-- /.col -->

</div><!-- /.row -->



<div class="row">

<div class="col-md-12">

<div class="box">

<div class="box-header with-border">

<h3 class="box-title">Monthly Recap Report</h3>

<div class="box-tools pull-right">

<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

<div class="btn-group">

<button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>

<ul class="dropdown-menu" role="menu">

<li><a href="#">Action</a></li>

<li><a href="#">Another action</a></li>

<li><a href="#">Something else here</a></li>

<li class="divider"></li>

<li><a href="#">Separated link</a></li>

</ul>

</div>

<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

</div>

</div><!-- /.box-header -->

<div class="box-body">

<div class="row">

<div class="col-md-8">

<p class="text-center">

<strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>

</p>

<div class="chart-responsive">

<!-- Sales Chart Canvas -->

<canvas id="salesChart" height="180"></canvas>

</div><!-- /.chart-responsive -->

</div><!-- /.col -->

<div class="col-md-4">

<p class="text-center">

<strong>Goal Completion</strong>

</p>

<div class="progress-group">

<span class="progress-text">Add Products to Cart</span>

<span class="progress-number"><b>160</b>/200</span>

<div class="progress sm">

<div class="progress-bar progress-bar-aqua" style="width: 80%"></div>

</div>

</div><!-- /.progress-group -->

<div class="progress-group">

<span class="progress-text">Complete Purchase</span>

<span class="progress-number"><b>310</b>/400</span>

<div class="progress sm">

<div class="progress-bar progress-bar-red" style="width: 80%"></div>

</div>

</div><!-- /.progress-group -->

<div class="progress-group">

<span class="progress-text">Visit Premium Page</span>

<span class="progress-number"><b>480</b>/800</span>

<div class="progress sm">

<div class="progress-bar progress-bar-green" style="width: 80%"></div>

</div>

</div><!-- /.progress-group -->

<div class="progress-group">

<span class="progress-text">Send Inquiries</span>

<span class="progress-number"><b>250</b>/500</span>

<div class="progress sm">

<div class="progress-bar progress-bar-yellow" style="width: 80%"></div>

</div>

</div><!-- /.progress-group -->

</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- ./box-body -->

<div class="box-footer">

<div class="row">

<div class="col-sm-3 col-xs-6">

<div class="description-block border-right">

<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>

<h5 class="description-header">$35,210.43</h5>

<span class="description-text">TOTAL REVENUE</span>

</div><!-- /.description-block -->

</div><!-- /.col -->

<div class="col-sm-3 col-xs-6">

<div class="description-block border-right">

<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>

<h5 class="description-header">$10,390.90</h5>

<span class="description-text">TOTAL COST</span>

</div><!-- /.description-block -->

</div><!-- /.col -->

<div class="col-sm-3 col-xs-6">

<div class="description-block border-right">

<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>

<h5 class="description-header">$24,813.53</h5>

<span class="description-text">TOTAL PROFIT</span>

</div><!-- /.description-block -->

</div><!-- /.col -->

<div class="col-sm-3 col-xs-6">

<div class="description-block">

<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>

<h5 class="description-header">1200</h5>

<span class="description-text">GOAL COMPLETIONS</span>

</div><!-- /.description-block -->

</div>

</div><!-- /.row -->

</div><!-- /.box-footer -->

</div><!-- /.box -->

</div><!-- /.col -->

</div><!-- /.row -->



<!-- Main row -->

<div class="row">

<!-- Left col -->

<div class="col-md-8">

<!-- MAP & BOX PANE -->

<div class="box box-success">

<div class="box-header with-border">

<h3 class="box-title">Visitors Report</h3>

<div class="box-tools pull-right">

<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

</div>

</div><!-- /.box-header -->

<div class="box-body no-padding">

<div class="row">

<div class="col-md-9 col-sm-8">

<div class="pad">

<!-- Map will be created here -->

<div id="world-map-markers" style="height: 325px;"></div>

</div>

</div><!-- /.col -->

<div class="col-md-3 col-sm-4">

<div class="pad box-pane-right bg-green" style="min-height: 280px">

<div class="description-block margin-bottom">

<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>

<h5 class="description-header"><?=$_SESSION['visitor_count']?></h5>

<span class="description-text">Visits</span>

</div><!-- /.description-block -->

<div class="description-block margin-bottom">

<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>

<h5 class="description-header">30%</h5>

<span class="description-text">Referrals</span>

</div><!-- /.description-block -->

<div class="description-block">

<div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>

<h5 class="description-header">70%</h5>

<span class="description-text">Organic</span>

</div><!-- /.description-block -->

</div>

</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- /.box-body -->

</div><!-- /.box -->



</div><!-- /.col -->



<div class="col-md-4">

<!-- Info Boxes Style 2 -->

<div class="info-box bg-yellow">

<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Inventory</span>

<span class="info-box-number">5,200</span>

<div class="progress">

<div class="progress-bar" style="width: 50%"></div>

</div>

<span class="progress-description">

50% Increase in 30 Days

</span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

<div class="info-box bg-green">

<span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Mentions</span>

<span class="info-box-number">92,050</span>

<div class="progress">

<div class="progress-bar" style="width: 20%"></div>

</div>

<span class="progress-description">

20% Increase in 30 Days

</span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

<div class="info-box bg-red">

<span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Downloads</span>

<span class="info-box-number">114,381</span>

<div class="progress">

<div class="progress-bar" style="width: 70%"></div>

</div>

<span class="progress-description">

70% Increase in 30 Days

</span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

<div class="info-box bg-aqua">

<span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

<div class="info-box-content">

<span class="info-box-text">Direct Messages</span>

<span class="info-box-number">163,921</span>

<div class="progress">

<div class="progress-bar" style="width: 40%"></div>

</div>

<span class="progress-description">

40% Increase in 30 Days

</span>

</div><!-- /.info-box-content -->

</div><!-- /.info-box -->

</div><!-- /.col -->

</div><!-- /.row -->



<div class='row'>

<div class='col-md-8'>

<!-- USERS LIST -->

<div class="box box-danger">

<div class="box-header with-border">

<h3 class="box-title">Latest Members</h3>

<div class="box-tools pull-right">

<span class="label label-danger"><?php $users_count=$posts->all('users','count(*) as count','user_id'); print_r($users_count[0]['count']);?> Members</span>

<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

</div>

</div><!-- /.box-header -->

<div class="box-body no-padding">

<ul class="users-list clearfix">
<?php 
$users_img=$posts->all('users','*','user_id','10');
foreach ($users_img as $key => $value) :
?>

<li>

<img src="<?php $img= $value[image]? $value[image]: 'images/user-icon.png'; echo $img;?>" alt="User Image"/>

<a class="users-list-name" href="#"><?=$value[username]?></a>

<!-- <span class="users-list-date">Today</span> -->

</li>
<?php 
endforeach;?>


</ul><!-- /.users-list -->

</div><!-- /.box-body -->

<div class="box-footer text-center">

<a href="javascript::" class="uppercase">View All Users</a>

</div><!-- /.box-footer -->

</div><!--/.box -->

</div><!-- /.col -->

<div class='col-md-4'>



</div><!-- /.col -->

</div><!-- /.row -->



<div class="row">

<div class="col-md-8">

<!-- TABLE: LATEST ORDERS -->


</div><!-- /.col -->

<div class="col-md-4">

<!-- PRODUCT LIST -->



</div><!-- /.col -->

</div><!-- /.row -->



</section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?php include('footer.php');?>

