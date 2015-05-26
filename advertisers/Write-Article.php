<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>


<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<?php if(isset($_GET['article_id'])):?>
<h3 class="box-title">Edit Article</h3>
<?php 
$article_id=base64_decode($_GET['article_id']);
$article=$posts->select('articals',"article_id=$article_id",'*','user_id');
?>
<?php else:?>
<h3 class="box-title">Write Article</h3>
<?php endif;?>
</div>
<div class="box-body">
<?php if(isset($_GET['article_id'])):?>
<form role="form" action="../api/postlinks_api/Article_Edit" method="POST">
<?php else:?>
<form role="form" action="../api/postlinks_api/Article_Create" method="POST">
<?php endif;?>
<div class="box-body">
<div class="form-group">
<label for="exampleInputtitle">Article Title(s)</label>
<input type="text" class="form-control" placeholder="Enter title" name="title" value="<?php if($article[0]['article_title']): echo $article[0]['article_title'];endif; ?> ">
<input type="hidden" class="form-control"  name="profile_id" value="<?php echo base64_decode($_GET['profile_id']);?>">
<input type="hidden" class="form-control"  name="project_folder" value="<?php echo $p_id= base64_decode($_GET['folder_id']);?>">
<input type="hidden" class="form-control"  name="category_id" value="<?php echo $posts->get_field('article_profiles',"folder_id='$p_id'","categories");?>">
</div>
<div class="form-group">
<label for="exampleInputNotes">Notes for Your Internal Use:</label>
<input type="text" class="form-control" name="Notes" placeholder="Notes" value="<?php if($article[0]['article_note']): echo $article[0]['article_note'];endif; ?>">
</div>
<div class="form-group">
<label>
<textarea class="form-control" id="ckeditor" name="description"  placeholder="Place some text here"><?php if($article[0]['article_text']): echo $article[0]['article_text'];endif; ?></textarea>
</label>
</div>
</div><!-- /.box-body -->

<div class="box-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div><!-- /.box-body -->
<div class="box-footer">
Footer
</div><!-- /.box-footer-->


</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include('main-footer.php');?>
