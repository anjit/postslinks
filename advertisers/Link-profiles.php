<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>
<?php 
$user_id=$_SESSION['user_id'];
?>

<!-- Main content -->
<section class="content">
<div class="row box"> 
    
    <div class="col-md-4">	
    <div class="box-header with-border">
    <h3 class="box-title">
   <button class="btn btn-block btn-primary btn-mid" data-toggle="modal" data-target="#addmodel" data-title="Add New Link Profile"><i class="fa fa-plus"></i> Add Profiles</button>
   <button class="btn btn-block btn-primary btn-mid" data-toggle="modal" data-target="#addmodel" data-title="Add Project"><i class="fa fa-plus"></i> Create Mass Campaign</button>
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
       <option value="pageurl">Profile Title</option>
       <option value="number_articles">Number of Articles</option>
       <!-- <option value="posts">Existing posts</option>
       <option value="qposts">Queued posts</option>
       <option value="waitinventory">Waiting on inventory</option>
        <option value="needcredits">Needing More Credits</option>
        <option value="limitmaxbudget">Max Budget Reached</option> --> 
    </select>
    </div>
<div class="col-md-6 box-header" >	
    <select class="form-control p_fid" name="limit">
    <option value="">All project folders</option>
    <?php $folders=$posts->select('project_folder',"user_id='$user_id'",'folder_name,folder_id','user_id')?>
    <?php foreach ($folders as $key => $value):?>
    <option value="<?=$value['folder_id'];?>" <?php if($_GET['p_fid']==$value['folder_id']) echo 'selected';?>><?=$value['folder_name'];?></option>
  <?php endforeach;?>
  </select>
    </div>
    <div class="col-md-6 box-header">	
    <select class="form-control plist" name="limit">
     <option value="">Display per page</option>
       <option value="10">10 profiles per page</option>
       <option selected="" value="20">20 profiles per page</option>
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

 $profiles=$posts->select('link_profiles',"user_id='$user_id'",'*','user_id'); 
  if(empty($profiles)):
  require('../api/postlinks_api/GetLinkProfiles.php');

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

$insert_id[]=$posts->insert('link_profiles',$keys,$values);
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
$profiles=$posts->select('link_profiles',"user_id='$user_id' and pageurl like'%$q%'",'*','user_id'); 
elseif(isset($_GET['plist'])):
 $limit=$_GET['plist'];
$profiles=$posts->select('link_profiles',"user_id='$user_id'",'*','user_id',$limit); 
elseif(isset($_GET['psort'])):
 $psort=$_GET['psort'];
$projects=$posts->select('article_profiles',"user_id='$user_id'",'*',$psort,$limit); 
elseif(isset($_GET['p_fid'])):
$p_fid=$_GET['p_fid'];
if($p_fid!=''):$profiles=$posts->select('link_profiles',"user_id='$user_id' and folder_id='$p_fid'",'*','folder_id'); 
else:$profiles=$posts->select('link_profiles',"user_id='$user_id'",'*','folder_id'); 
endif;

else:  
$profiles=$posts->select('link_profiles',"user_id='$user_id'",'*','user_id'); 
endif; 
foreach ($profiles as $key => $value):
?> 
<!-- list of the all profiles-->
<div class="row box box-primary collapsed-box">
<div class="col-md-12"> 
<a href="#"  class="btn btn-box-tool" data-widget="collapse"> 
<i class="fa fa-plus"></i>  
<h3><?php echo $value['pageurl'];?> (Created: <?php echo $value['addeddate'];?>)</h3></a>
<h4>Folder: <?php echo $posts->get_field('project_folder',"folder_id='$value[folder_id]'","folder_name");?></h4>
</div>
<div class="box-body">
<div class="col-md-6">  
<ul class="list-group">
<li class="list-group-item">Number of comment links</li>
<li class="list-group-item">Number of contextual links</li>
<li class="list-group-item">Number of queued comment links</li>
<li class="list-group-item">Number of queued contextual links</li>
<li class="list-group-item">Total Cost</li>
</ul>
</div>
<div class="col-md-4">  
<ul class="list-group">
<li class="list-group-item"><a href="#" > <?php echo $value['commentlinks'];?> </a> </li>
<li class="list-group-item"><a href="#" > <?php echo $value['commentcost'];?> </a></li>
<li class="list-group-item"><a href="#" > <?php echo $value['keywordlinks'];?> </a></li>
<li class="list-group-item"><a href="#" > <?php echo $value['queued_links'];?> </a></li>
<li class="list-group-item"><a href="#" > <?php echo $value['totalcost'];?> </a></li>
</ul>
</div>
<div class="col-md-1"></div>
<div class="col-md-6">  
<a href="#" data-toggle="modal" profile_id="<?php echo $value['profile_id'];?>" value="<?php echo $value['pageurl'];?>" data-target="#editmodel" data-title="Edit Link Profile"><button class="btn  btn-default btn-xs">Edit</button></a>
<a href="Post-Links-Create-Queue?profile_id=<?php echo base64_encode($value['profile_id']);?>"><button class="btn  btn-default btn-xs">Post Links/Create Queue</button></a>
<a href="Link-profiles"><button class="btn  btn-default btn-xs">Add Comment Links</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Add Contextual Links</button></a>
</div>
</div>
</div>    
<!--   end of listing of the profiles -->
<?php endforeach;?>

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Add New Profile -->
<div class="modal fade" id="addmodel" role="dialog" aria-labelledby="addmodelLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-info">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p>
      <p class="text-muted">Before you can build links, we need to know where you want the links to point. In other words, you need to create a "Link Profile". Basically, a Link Profile just makes it so you don't have to type in your target URL each time you want to create a link.</p>

<p class="text-muted">To stay organized, you can group Link Profiles together by putting them in Project Folders. You can have a separate Project Folder for each campaign, each website, each client, etc.</p>

<p class="text-muted"><span class="text-info">Note:</span> At the request of our publishers, we cannot allow adult, gambling, or casino Contextual or Comment links in the PostLinks.com system. If you wish to post gambling or casino links, please use the Article Posts functionality and choose the gambling (and only the gambling) category for your article post profile.</p>
                   <form role="form" action='../api/postlinks_api/LinkProfile_Create' method="POST">
                  <div class="box-body">
                   <div class="form-group">
                   <label for="exampleInputProject" >Target Url</label>
                   <input type="text" class="form-control" id="Project" name="pageurl" placeholder="Enter pageurl">
                   </div>
                   <div class="form-group">
                   <label for="exampleInputProject">Project Folder</label>
                   <select name="FolderID" class="form-control " id="FolderID">
                   <option value=""></option>
                  <?php $projs=$posts->select('project_folder',"user_id='$user_id'","*","id");
                     foreach ($projs as $key => $value):
                   ?>
                   <option value="<?php echo $value['folder_id'];?>" ><?php echo $value['folder_name'];?></option>
                   <?php endforeach;?>
                   </select>

                   </div>
                   </div><!-- /.box-body -->
                   </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Add New Project Folder">
                  </div>
                </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          
<!-- Edit  Profile -->


<!-- Add New Profile -->
<div class="modal fade" id="editmodel" role="dialog" aria-labelledby="addmodelLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-info">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p>
      <p class="text-muted">Before you can build links, we need to know where you want the links to point. In other words, you need to create a "Link Profile". Basically, a Link Profile just makes it so you don't have to type in your target URL each time you want to create a link.</p>

<p class="text-muted">To stay organized, you can group Link Profiles together by putting them in Project Folders. You can have a separate Project Folder for each campaign, each website, each client, etc.</p>

<p class="text-muted"><span class="text-info">Note:</span> At the request of our publishers, we cannot allow adult, gambling, or casino Contextual or Comment links in the PostLinks.com system. If you wish to post gambling or casino links, please use the Article Posts functionality and choose the gambling (and only the gambling) category for your article post profile.</p>
                   <form role="form" action='../api/postlinks_api/LinkProfile_Edit' method="POST">
                  <div class="box-body">
                   <div class="form-group">
                   <label for="exampleInputProject" >Target Url</label>
                   <input type="text" class="form-control" id="editProject" name="pageurl" placeholder="Enter pageurl">
                   <input type="hidden" class="form-control" id="profile_id" name="profile_id" placeholder="Enter pageurl">
                   </div>
                   <div class="form-group">
                   <label for="exampleInputProject">Project Folder</label>
                   <select name="FolderID" class="form-control" id="FolderID">
                   <option value=""></option>
                  <?php $projs=$posts->select('project_folder',"user_id='$user_id'","*","id");
                     foreach ($projs as $key => $value):
                   ?>
                   <option value="<?php echo $value['folder_id'];?>"><?php echo $value['folder_name'];?></option>
                   <?php endforeach;?>
                   </select>

                   </div>
                   </div><!-- /.box-body -->
                   </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Edit Profile">
                  </div>
                </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          
<!-- Edit Profile -->

<?php include('footer.php');?>
<script type="text/javascript">
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
<script type="text/javascript">
$('#editmodel').on('show.bs.modal', function (e) {
$message = $(e.relatedTarget).attr('data-message');

$(this).find('.modal-body p').text($message);

$title = $(e.relatedTarget).attr('data-title');
$value = $(e.relatedTarget).attr('value');
$profile_id = $(e.relatedTarget).attr('profile_id');
$(this).find('.modal-title').text($title);
$(this).find('#editProject').val($value);
$(this).find('#profile_id').val($profile_id);
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