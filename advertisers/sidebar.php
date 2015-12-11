

<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->

<section class="sidebar">

<!-- Sidebar user panel -->

<div class="user-panel">

<div class="pull-left image">

<img src="<?php echo $_SESSION['user_img'];?>" class="img-circle" alt="User Image" />

</div>

<div class="pull-left info">

<p><?=$_SESSION['username']?></p>



<a href="#"><i class="fa fa-circle text-success"></i> Online</a>

</div>

</div>

<!-- sidebar menu: : style can be found in sidebar.less -->

<ul class="sidebar-menu">

<li class="header">MAIN NAVIGATION</li>

<li class="active treeview">

<a href="index">

<i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
</li>

<li class="treeview">

<a href="project-folders">

<i class="fa fa-files-o"></i>

<span>Project Folders</span>
<span class="label label-primary pull-right">4</span>
</a>
</li>

<li>

<a href="Article-profiles">

<i class="fa fa-th"></i> <span>Article profiles</span> <small class="label pull-right bg-green">new</small>

</a>

</li>

<li class="treeview">

<a href="Link-profiles">

<i class="fa fa-pie-chart"></i>

<span>Link Profiles</span>

</a>

</li>

<li class="treeview">

<a href="#">

<i class="fa fa-laptop"></i>

<span>Affiliate Account</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="Affiliate-account">Affiliate Account</a></li>
<li><a href="Affiliate-Links">Affiliate Links</a></li>
<li><a href="Affiliate-Account-Statistics">Affiliate Account Statistics</a></li>
</ul>

</li>

<li class="treeview">

<a href="Help">

<i class="fa fa-edit"></i> <span>Help</span>

</a>


</li>

<li class="treeview">

<a href="../publishers">

<i class="fa fa-table"></i> <span>Publisher Account</span>

</a>
</li>

<li>

<a href="Purchase-Link-Credits">

<i class="fa fa-calendar"></i> <span>Purchase Link Credits</span>

<small class="label  bg-red">3</small>

</a>

</li>

<li>

<a href="Links-Built">

<i class="fa fa-envelope"></i> <span>Links Built</span>
<small class="label  bg-yellow">12</small>
</a>

</li>

<li class="treeview">

<a href="Contact-Us">

<i class="fa fa-folder"></i> <span>Contact Us</span>

</a>

</li>

</ul>

</li>

</section>

<!-- /.sidebar -->

</aside>

