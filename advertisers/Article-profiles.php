<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>
<?php $user_id=$_SESSION['user_id'];
?>

<!-- Main content -->
<section class="content">
<div class="row box"> 
    
    <div class="col-md-4">	
    <div class="box-header with-border">
    <h3 class="box-title">
   <button class="btn btn-block btn-primary btn-mid" data-toggle="modal" data-target="#addmodel" data-title="Add Profile"><i class="fa fa-plus"></i> Add Profile</button>
   <a href="project-folders" class="btn btn-block btn-primary btn-mid"><i class="fa fa-plus"></i> Add Project Folder</a></h3>
    </div><!-- /.box-header -->
    </div>

    <div class="col-md-6 ">	
    <form role="form" method="post">
    <div class="col-md-6 box-header" >	
    <div class="input-group">
    <input type="text" name='q' class="form-control">
    <span class="input-group-btn">
    <button class="btn btn-info btn-flat" type="button">Go!</button>
    </span>
    </div>
    </div>
    <div class="col-md-6 box-header">	
    <select class="form-control psort">
     <option value="">Sort Profiles By</option>
       <option value="addeddate">Date added</option>
       <option value="profile_title">Profile Title</option>
       <option value="number_articles">Number of Articles</option>
       <option value="number_posts">Existing posts</option>
      <!-- <option value="qposts">Queued posts</option>
        <option value="waitinventory">Waiting on inventory</option>
        <option value="needcredits">Needing More Credits</option>
        <option value="limitmaxbudget">Max Budget Reached</option> --> 
    </select>
    </div>
<div class="col-md-6 box-header" >	
    <select class="form-control p_fid" >
    <option value="">All project folders</option>
   <?php $folders=$posts->select('project_folder',"user_id='$user_id'",'folder_name,folder_id','user_id')?>
    <?php   foreach ($folders as $key => $value):?>
    <option value="<?=$value['folder_id'];?>" <?php if($_GET['p_fid']==$value['folder_id']) echo 'selected';?>><?=$value['folder_name'];?></option>
  <?php endforeach;?>
  </select>
    </div>
    <div class="col-md-6 box-header">	
    <select class="form-control plist" name="limit">
     <option value="">Display per page</option>
       <option value="10">10 profiles per page</option>
       <option value="20">20 profiles per page</option>
       <option value="50">50 profiles per page</option>
       <option value="100">100 profiles per page</option>
  </select>
    </div>
  </form>
 </div>
  <div class="col-md-2 ">
  	<div class="box-tools pull-right">
    <a href=""><span class="label label-primary">Project Folder Help</span></a>
    </div><!-- /.box-tools -->
    </div>
 </div>
 
 <?php 
 $user_id=$_SESSION['user_id'];

 $projects=$posts->select('article_profiles',"user_id='$user_id'",'*','user_id'); 
  if(empty($projects)):
  require('../api/postlinks_api/GetArticleProfiles.php');

 foreach ($result as $pros):
  $keys=array_keys($pros);
  array_push($keys,"addeddate");
  array_push($keys,"user_id");
  $value=array_values($pros);
  array_push($value,date('y-m-d H:i:s'));
  array_push($value,$user_id);
 foreach ($value as $key => $value) {
   $values[]="'".$value."'";
   }

$insert_id[]=$posts->insert('article_profiles',$keys,$values);
unset($values) ;
unset($keys) ;

endforeach;

 elseif(empty($insert_id)):
  ?>  
<?php
endif;
?>
<?php 
if(isset($_POST['q'])):
$q=$_POST['q'];
$projects=$posts->select('article_profiles',"user_id='$user_id' and profile_title like'%$q%'",'*','user_id'); 
elseif(isset($_GET['plist'])):
 $limit=$_GET['plist'];
$projects=$posts->select('article_profiles',"user_id='$user_id'",'*','user_id',$limit); 
elseif(isset($_GET['psort'])):
 $psort=$_GET['psort'];
$projects=$posts->select('article_profiles',"user_id='$user_id'",'*',$psort,$limit); 
elseif(isset($_GET['p_fid'])):
$p_fid=$_GET['p_fid'];
if($p_fid!=''):$projects=$posts->select('article_profiles',"user_id='$user_id' and folder_id='$p_fid'",'*','folder_id'); 
else:$projects=$posts->select('article_profiles',"user_id='$user_id'",'*','folder_id'); 
endif;
else:  
$projects=$posts->select('article_profiles',"user_id='$user_id'",'*','user_id'); 
endif; 
foreach ($projects as $key => $value):
?> 
<!-- list of the all projects-->
<div class="row box box-primary collapsed-box">
<div class="col-md-12  box-title">
<a href="#"  class="btn btn-box-tool" data-widget="collapse"> 
<i class="fa fa-plus"></i><h4><?php echo $value['profile_title'];?> (Advertising & Marketing) (created: <?php echo $value['addeddate'];?>) )</h3>
</a>
</div>
<div class="box-body">
<div class="col-md-12"> 
<h5>Folder: <?php echo $posts->get_field('project_folder',"folder_id='$value[folder_id]'","folder_name");?></h5>
</div>
<div class="col-md-6">  
<ul class="list-group">
<li class="list-group-item">Number of articles</li>
<li class="list-group-item">Number of completed posts</li>
<li class="list-group-item">Number of queued posts</li>
<li class="list-group-item">Total Cost</li>
</ul>
</div>
<div class="col-md-6">  
<ul>
<li class="list-group-item"><a href="article" ><?php echo $value['number_articles'];?></a></li>
<li class="list-group-item"><a href="#" ><?php echo $value['number_posts'];?></a></li>
<li class="list-group-item"><a href="queuedposts?profile_id=<?php echo base64_encode($value['profile_id']);?>" ><?php echo $value['number_os_articles'];?></a></li>
<li class="list-group-item"><?php echo $value['totalcost'];?> credits</li>
</ul>
</div>
<div class="col-md-12">  
<a href="#" data-toggle="modal" folder_id="<?php echo $value['folder_id'];?>" cat="<?php echo $value['categories'];?>" data-target="#editmodel" profile_id="<?php echo $value['profile_id'];?>" value="<?php echo $value['profile_title'];?>" data-title="Edit Profile"><button class="btn  btn-default btn-xs">Edit</button></a>
<a href="article?profile_id=<?php echo base64_encode($value['profile_id']);?>"><button class="btn  btn-default btn-xs">Manage Articles</button></a>
<a href="Write-Article?profile_id=<?php echo base64_encode($value['profile_id']);?>&&folder_id=<?php echo base64_encode($value['folder_id']);?>"><button class="btn  btn-default btn-xs">Write Article</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Upload Articles</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Outsource Articles</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Article Wizard</button></a>
</div>
</div>

</div>    
<!--   end of listing of the projects -->
<?php endforeach;?>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Add New Profile -->
<div class="modal fade" id="addmodel" role="dialog" aria-labelledby="addmodelLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                   <form role="form" action='../api/postlinks_api/ArticleProfile_Create' method="POST">
                  <div class="box-body">
                   <div class="form-group">
                   <label for="exampleInputProject">Article Post Profile Title</label>
                   <input type="text" class="form-control" id="Project" name="profile_title" placeholder="Enter profile Title">
                   </div>
                   <div class="form-group">
                   <label for="exampleInputProject">Project Folder</label>
                   <select name='folder_id'>
                   <option value="">Select Project Folder</option>
                    <?php $project_folders=$posts->select('project_folder',"user_id='$user_id'",'*','folder_id'); 
                   if(!empty($project_folders)):
                    foreach ($project_folders as $key => $value) :
                      ?>
                    <option value="<?php echo $value['folder_id'];?>"><?php echo $value['folder_name'];?></option>
                   <?php 
                   endforeach;
                    endif;
                   ?>
                   </select>
                    </div>
 <div class="form-group">
 <label for="exampleInputProject">Post Categories:</label>
 </br>
 <span>Please select the 1-5 most appropriate categories that describe the articles for this profile.</span>
</br></br>
<!--div style="width: 100%; height: 200px; overflow: auto; position:relative; clear: both;"-->
<input type="checkbox" name="cat[]" value="1" id="cat1"><label for="cat1">Advertising &amp; Marketing</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Marketing Tips, Printing, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="2" id="cat2"><label for="cat2">Arts &amp; Entertainment</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Movies, Theater, Celebrities, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="3" id="cat3"><label for="cat3">Auto &amp; Motor</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Cars, Trucks, and Other Vehicles)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="4" id="cat4"><label for="cat4">Business Products &amp; Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Printing, Ink Cartridges, Other Services to Help Businesses)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="6" id="cat6"><label for="cat6">Clothing &amp; Fashion</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Clothing, Accessories, Fashion, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="7" id="cat7"><label for="cat7">Employment</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Resume Writing, Tips for Jobs, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="20" id="cat20"><label for="cat20">Financial </label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Money, Stocks, Financial Tips, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="34" id="cat34"><label for="cat34">Foods &amp; Culinary</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Food, Drinks, Cooking, Recipies, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="70" onclick="handleGambling(this)" id="cat70"><label for="cat70">Gambling</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Bingo, Online Casinos, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="54" id="cat54"><label for="cat54">Health &amp; Fitness</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Exercise, Fitness, Healthy Living, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="55" id="cat55"><label for="cat55">Health Care &amp; Medical</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Health and Medical Tips, Information, and Resources)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="56" id="cat56"><label for="cat56">Home Products &amp; Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Home Improvement, Landscaping, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="57" id="cat57"><label for="cat57">Internet Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Internet Services Such as Hosting, Web Design, Etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="58" id="cat58"><label for="cat58">Legal</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Legal Advice and Information Relating to the Law)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="69" id="cat69"><label for="cat69">Miscellaneous</label><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="59" id="cat59"><label for="cat59">Personal Product &amp; Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Beauty Products, Weightloss Products, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="60" id="cat60"><label for="cat60">Pets &amp; Animals</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information about Animal Care, Pets, and Pet Products)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="62" id="cat62"><label for="cat62">Real Estate</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Real Estate Tips, Rentals, Homes for Sale, Etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="63" id="cat63"><label for="cat63">Relationships</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Dating, Relationship Advice, Weddings, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="64" id="cat64"><label for="cat64">Software</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information about Software and Software Companies)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="65" id="cat65"><label for="cat65">Sports &amp; Athletics</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information about Sports and Athletics)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="66" id="cat66"><label for="cat66">Technology</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Gadgets, Computers, and Other Technology Topics)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="67" id="cat67"><label for="cat67">Travel </label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Travel Tips, Tourism, Vacation Spots, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="68" id="cat68"><label for="cat68">Web Resources</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information and Tips about Web Development, Coding, Etc.)</i></div><div style="margin-bottom:5px;"></div>
        <!--/div-->
       </div>                  

                   </div><!-- /.box-body -->
                   </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Add New Profile">
                  </div>
                </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          
<!-- End of add profile -->
<!-- Edit Profile -->
<div class="modal fade" id="editmodel" role="dialog" aria-labelledby="addmodelLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                   <form role="form" action='../api/postlinks_api/ArticleProfile_Edit' method="POST">
                  <div class="box-body">
                   <div class="form-group">
                   <label for="exampleInputProject">Edit Article Post Profile Title</label>
                   <input type="text" class="form-control"  id="editProfile" name="profile_title" placeholder="Enter Profile title">
                   <input type="hidden" class="form-control"  id="profile_id" name="profile_id">
                   </div>
                   <div class="form-group">
                   <label for="exampleInputProject">Project Folder</label>
                   <select name='folder_id'>
                   <option value="">Select Project Folder</option>
                    <?php $project_folders=$posts->select('project_folder',"user_id='$user_id'",'*','folder_id'); 
                   if(!empty($project_folders)):
                    foreach ($project_folders as $key => $value) :
                      ?>
                    <option id="folder<?php echo $value['folder_id'];?>" value="<?php echo $value['folder_id'];?>"><?php echo $value['folder_name'];?></option>
                   <?php 
                   endforeach;
                    endif;
                   ?>
                   </select>
                    </div>
                    <div class="form-group">
 <label for="exampleInputProject">Post Categories:</label>
 </br>
 <span>Please select the 1-5 most appropriate categories that describe the articles for this profile.</span>
</br></br>
<!--div style="width: 100%; height: 200px; overflow: auto; position:relative; clear: both;"-->
<input type="checkbox" name="cat[]" value="1" id="cat1"><label for="cat1">Advertising &amp; Marketing</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Marketing Tips, Printing, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="2" id="cat2"><label for="cat2">Arts &amp; Entertainment</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Movies, Theater, Celebrities, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="3" id="cat3"><label for="cat3">Auto &amp; Motor</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Cars, Trucks, and Other Vehicles)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="4" id="cat4"><label for="cat4">Business Products &amp; Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Printing, Ink Cartridges, Other Services to Help Businesses)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="6" id="cat6"><label for="cat6">Clothing &amp; Fashion</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Clothing, Accessories, Fashion, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="7" id="cat7"><label for="cat7">Employment</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Resume Writing, Tips for Jobs, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="20" id="cat20"><label for="cat20">Financial </label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Money, Stocks, Financial Tips, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="34" id="cat34"><label for="cat34">Foods &amp; Culinary</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Food, Drinks, Cooking, Recipies, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="70" onclick="handleGambling(this)" id="cat70"><label for="cat70">Gambling</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Bingo, Online Casinos, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="54" id="cat54"><label for="cat54">Health &amp; Fitness</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Exercise, Fitness, Healthy Living, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="55" id="cat55"><label for="cat55">Health Care &amp; Medical</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Health and Medical Tips, Information, and Resources)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="56" id="cat56"><label for="cat56">Home Products &amp; Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Home Improvement, Landscaping, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="57" id="cat57"><label for="cat57">Internet Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Internet Services Such as Hosting, Web Design, Etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="58" id="cat58"><label for="cat58">Legal</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Legal Advice and Information Relating to the Law)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="69" id="cat69"><label for="cat69">Miscellaneous</label><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="59" id="cat59"><label for="cat59">Personal Product &amp; Services</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Beauty Products, Weightloss Products, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="60" id="cat60"><label for="cat60">Pets &amp; Animals</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information about Animal Care, Pets, and Pet Products)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="62" id="cat62"><label for="cat62">Real Estate</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Real Estate Tips, Rentals, Homes for Sale, Etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="63" id="cat63"><label for="cat63">Relationships</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Dating, Relationship Advice, Weddings, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="64" id="cat64"><label for="cat64">Software</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information about Software and Software Companies)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="65" id="cat65"><label for="cat65">Sports &amp; Athletics</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information about Sports and Athletics)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="66" id="cat66"><label for="cat66">Technology</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Gadgets, Computers, and Other Technology Topics)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="67" id="cat67"><label for="cat67">Travel </label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Travel Tips, Tourism, Vacation Spots, etc.)</i></div><div style="margin-bottom:5px;"></div>
<input type="checkbox" name="cat[]" value="68" id="cat68"><label for="cat68">Web Resources</label> <div style="margin-left:18px;"><i style="font-size:80%;color: grey;">(Includes: Information and Tips about Web Development, Coding, Etc.)</i></div><div style="margin-bottom:5px;"></div>
        <!--/div-->
       </div>   
                   </div><!-- /.box-body -->
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update Project Folder Name">
                  </div>
                </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          
 <!-- End of add project -->
        
<?php include('main-footer.php');?>
<script>
$('#addmodel').on('show.bs.modal', function (e) {
$message = $(e.relatedTarget).attr('data-message');

$(this).find('.modal-body p').text($message);

$title = $(e.relatedTarget).attr('data-title');

$(this).find('.modal-title').text($title);
// Pass form reference to modal for submission on yes/ok
var form = $(e.relatedTarget).closest('form');
$(this).find('.modal-footer #confirm').data('form', form);
});
$('#addmodel').find('.modal-footer #confirm').on('click', function(){

$(this).data('form').submit();

});
</script>
<script>
$('#editmodel').on('show.bs.modal', function (e) {
$message = $(e.relatedTarget).attr('data-message');

$(this).find('.modal-body p').text($message);

$title = $(e.relatedTarget).attr('data-title');
$value = $(e.relatedTarget).attr('value');
$profile_id = $(e.relatedTarget).attr('profile_id');
$folder_id = $(e.relatedTarget).attr('folder_id');
$cat = $(e.relatedTarget).attr('cat');
$(this).find('.modal-title').text($title);
$(this).find('#editProfile').val($value);
$(this).find('#profile_id').val($profile_id);
$(this).find('#cat'+$cat).attr('checked',true);
$(this).find('#folder'+$folder_id).attr('selected',true);
// Pass form reference to modal for submission on yes/ok
var form = $(e.relatedTarget).closest('form');
$(this).find('.modal-footer #confirm').data('form', form);
});
$('#editmodel').find('.modal-footer #confirm').on('click', function(){

$(this).data('form').submit();

});
</script>
<script type="text/javascript">
$('.plist').on('change',function(){ 
window.location.href='?plist='+$(this).val();

});
$('.psort').on('change',function(){ 
window.location.href='?psort='+$(this).val();

});
$('.p_fid').on('change',function(){ 
window.location.href='?p_fid='+$(this).val();

});

</script>