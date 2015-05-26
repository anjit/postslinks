<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>


<!-- Main content -->
<section class="content">
   <div class="row box"> 
    
    <div class="col-md-4">	
    <div class="box-header with-border">
    <h3 class="box-title">
   <button class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#addmodel" data-title="Add Project"><i class="fa fa-plus"></i> Add Project Folder</button></h3>
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
    <select class="form-control plist" name="limit">
    <option value="">Select</option>
    <option value="2">2 Projects Per Page</option>
    <option value="4">4 Projects Per Page</option>
    <option value="6">6 Projects Per Page</option>
    <option value="8">8 Projects Per Page</option>
    <option value="10">10 Projects Per Page</option>
    <option value="">All Projects</option>
  </select>
     </form>
     </div>
 </div>
  <div class="col-md-2 ">
  	<div class="box-tools pull-right">
    <a href=""><span class="label label-primary">Project Folder Help</span></a>
    </div><!-- /.box-tools -->
    </div>
    

   </div>
 <?php 
 $user_id=$_SESSION['user_id'];

 $projects=$posts->select('project_folder',"user_id='$user_id'",'*','user_id'); 
  if(empty($projects)):
  require('../api/postlinks_api/GetFolders.php');

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

$insert_id[]=$posts->insert('project_folder',$keys,$values);
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
$projects=$posts->select('project_folder',"user_id='$user_id' and folder_name like'%$q%'",'*','user_id'); 
elseif(isset($_GET['plist'])):
 $limit=$_GET['plist'];
$projects=$posts->select('project_folder',"user_id='$user_id'",'*','user_id',$limit); 
else:  
$projects=$posts->select('project_folder',"user_id='$user_id'",'*','user_id'); 
endif; 
foreach ($projects as $key => $value):
?> 
<!-- list of the all projects-->
<div class="row box box box-primary">
<div class="col-md-12"> 
<h3><?php echo $value['folder_name'];?> (<?php echo $value['num_linkprofs'];?> links| 575 credits)</h3>
</div>
<div class="col-md-6">  
<ul class="list-group">
<li class="list-group-item">Articals Posts</li>
<li class="list-group-item">Comment Links</li>
<li class="list-group-item">Contextual Links</li>
</ul>
</div>
<div class="col-md-4">  
<ul class="list-group">
<li class="list-group-item">(<a href="#" > <?php echo $value['num_artprofs'];?> </a> Links <a href="#" > 0 </a> Credits <a href="#" > 0 </a> Profile)</li>
<li class="list-group-item">(<a href="#" > <?php echo $value['num_commentlinks'];?> </a> Links <a href="#" > 0 </a> Credits <a href="#" > 0 </a> Profile)</li>
<li class="list-group-item">(<a href="#" > <?php echo $value['num_contextuallinks'];?> </a> Links <a href="#" > 0 </a> Credits <a href="#" > 0 </a> Profile)</li>
</ul>
</div>
<div class="col-md-1"></div>
<div class="col-md-6">  
<a href="#" data-toggle="modal" p_id="<?php echo $value['folder_id'];?>" value="<?php echo $value['folder_name'];?>" data-target="#editmodel" data-title="Edit Project"><button class="btn  btn-default btn-xs">Edit</button></a>
<a href="Article-profiles"><button class="btn  btn-default btn-xs">Add Article Profile</button></a>
<a href="Link-profiles"><button class="btn  btn-default btn-xs">Add Links Profiles</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Create Campaign Queues</button></a>
</div>
</div>    
<!--   end of listing of the projects -->
<?php endforeach;?>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Add New Project -->
<div class="modal fade" id="addmodel" role="dialog" aria-labelledby="addmodelLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                   <form role="form" action='../api/postlinks_api/Folder_Create' method="POST">
                  <div class="box-body">
                   <div class="form-group">
                   <label for="exampleInputProject">Project Folder Name</label>
                   <input type="text" class="form-control" id="Project" name="project_folder" placeholder="Enter Project Name">
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
          
<!-- End of add project -->

<!-- Edit Project -->
<div class="modal fade" id="editmodel" role="dialog" aria-labelledby="addmodelLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                   <form role="form" action='../api/postlinks_api/Folder_Edit' method="POST">
                  <div class="box-body">
                   <div class="form-group">
                   <label for="exampleInputProject">Project Folder Name</label>
                   <input type="text" class="form-control"  id="editProject" name="project_folder" placeholder="Enter Project Name">
                   <input type="hidden" class="form-control"  id="Project_id" name="Project_id">
                   </div>
                   </div><!-- /.box-body -->
                   </p>
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
$Project_id = $(e.relatedTarget).attr('p_id');
$(this).find('.modal-title').text($title);
$(this).find('#editProject').val($value);
$(this).find('#Project_id').val($Project_id);
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
</script>