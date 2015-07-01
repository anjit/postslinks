<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>
<?php 
$article_id=base64_decode($_GET['article_id']);
$profile_id=base64_decode($_GET['profile_id']);
$user_id=$_SESSION['user_id'];

?>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Post Articles for 'backlinks' profile</h3>
</div>
<div class="box-body">
<div class="col-12">
<p>Enter your information below to create a queue to distribute your article. Please note that the more articles you publish at one time, the longer it may take the queue to complete. For example, if you distribute your article to 100 blogs, it may take 24 hours for the queue to complete. </p>
</div>
<form role="form" action="../api/postlinks_api/QueuePosts" method="POST">
<div class="box-body">
<div class="form-group">
<label for="exampleInputtitle">Article Title(s)</label>
<?php 
$articles=$posts->select('articals',"user_id='$user_id' and article_id ='$article_id'",'*','user_id'); 
echo $articles[0]['article_title'];
?>
<input type="hidden" class="form-control" name="article_id" value="<?php echo $article_id;?>">
<input type="hidden" class="form-control" name="profile_id" value="<?php echo $profile_id;?>">
</div>
<div class="form-group">
<label for="exampleInputNotes">Number of posts (?)</label>
<input type="text" name="Notes" placeholder="No of Post" value="">
</div>

<div class="form-group">
<label for="exampleInputNotes">I want...</label>
<button type="button" class="btn showprbtn">High PageRank Links</button>
<button type="button" class="btn showdabtn active">High Domain Authority Links</button>
</div>

<div class="form-group">
<div class="prank" style="display:none;">
<label for="exampleInputNotes">Min/Max Pagerank :</label>
<select name="lngMinPR" id="FromPR" onchange="calcCost()" style="width: 70px">
<option value="0">PR0</option>
<option value="1" selected="">PR1</option>
<option value="2">PR2</option>
<option value="3">PR3</option>
<option value="4">PR4</option>
<option value="5">PR5</option>
</select> TO 
<select name="lngMaxPR" id="ToPR" onchange="calcCost()" style="width: 70px">
<option value="0">PR0</option>
<option value="1">PR1</option>
<option value="2">PR2</option>
<option value="3">PR3</option>
<option value="4">PR4</option>
<option value="5" selected="">PR5</option>
</select>
</div>
<div class="drank" style="display:none;">
<label for="exampleInputNotes">Min/Max Domain Authority :</label>
<select name="lngMinDA" id="FromDA" onchange="calcCost()" style="width: 70px">
<option value="0">DA0</option>
<option value="10" selected="selected">DA10</option>
<option value="16">DA16</option>
<option value="22">DA22</option>
<option value="28">DA28</option>
<option value="35">DA35</option>
<option value="100">DA100</option>
</select> TO 
<select name="lngMaxDA" id="ToDA" onchange="calcCost()" style="width: 70px">
<option value="0">DA0</option>
<option value="10">DA10</option>
<option value="16">DA16</option>
<option value="22">DA22</option>
<option value="28">DA28</option>
<option value="35">DA35</option>
<option value="100" selected="selected">DA100</option>
</select>
</div>
</div>

<div class="form-group">
<label for="exampleInputNotes">Make Posts:</label>
<select name="Schedule" onchange="SwitchPerDaySet(this.value)">
<option value="instant" selected="">All-at-once</option>
<option value="1day">Daily</option>
<option value="7days">Weekly</option>
<option value="30days">Monthly</option>
</select>
<span id="boolRandomlyblock" style="display: none;">
<input type="checkbox" name="boolRandomly" id="boolRandomly" value="1" checked="checked"> <label for="boolRandomly">Randomize Post Distribution</label></span>
 </div>

<div class="form-group">
<div class="pperoid" style="display:none;">
<label for="exampleInputNotes">Number of posts per period :</label>
<input type="text" name="lngPostsPerPeriod" id="lngPostsPerPeriod" >
</div>
</div>


<div class="form-group">
<label for="exampleInputNotes">Maximum Budget :</label>
<input type="text" name="max_budget" placeholder="Max Budget" value="">
</div>
<div class="form-group">
<label for="exampleInputNotes">Available Credits :</label>
</div>
<div class="form-group">
<label for="exampleInputNotes">Min Posting Cost :</label>
</div>

</div><!-- /.box-body -->

<div class="box-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

</div><!-- /.box-body -->

</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include('main-footer.php');?>
<script type="text/javascript">
$(document).ready(function(){

$('.showprbtn').click(function(){
$('.prank').show();
$('.drank').hide();
});

$('.showdabtn').click(function(){
$('.drank').show();
$('.prank').hide();
});
});

function SwitchPerDaySet(val){
if(val=='1day')
{
$('.pperoid').show();	
}
if(val=='7days'){
	$('#boolRandomlyblock').show();
}
if(val=='instant'){
	$('#boolRandomlyblock').hide();
	$('.pperoid').hide();	
}
}


</script>