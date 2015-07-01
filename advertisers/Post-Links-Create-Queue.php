<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>


<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Queue Links for 'http://anjit.com' profile</h3>
</div>
<div class="box-body">
<p>Enter your information below to create a queue to distribute your target page links. Please note that the more links you place at one time, the longer it may take the queue to complete. For example, if you distribute your link to 100 blogs, it may take 24 hours for the queue to complete. 
</p>
<div class="col-12"><h3>Basic Campaign Info</h3></div>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Target Page Url (?):</label>
    http://anjit2.com
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Link Type (?):</label>
<select name="LinkType" id="LinkType" style="width: 200px">
<option value="comment" selected="">Comment Links</option>
<option value="keyword">Contextual Links</option>
</select>
</div>
<div><h3>Blog Filters</h3></div>
  <div class="form-group">
    <label for="exampleInputFile">Only Post on Blogs in this Category (?):</label>
   <select style="width: 200px" name="CID" id="CID">
            <option value="0">Any Category</option>
<option title="Includes: Marketing Tips, Printing, etc." value="1">Advertising &amp; Marketing</option><option title="Includes: Movies, Theater, Celebrities, etc." value="2">Arts &amp; Entertainment</option><option title="Includes: Cars, Trucks, and Other Vehicles" value="3">Auto &amp; Motor</option><option title="Includes: Printing, Ink Cartridges, Other Services to Help Businesses" value="4">Business Products &amp; Services</option><option title="Includes: Clothing, Accessories, Fashion, etc." value="6">Clothing &amp; Fashion</option><option title="Includes: Resume Writing, Tips for Jobs, etc." value="7">Employment</option><option title="Includes: Money, Stocks, Financial Tips, etc." value="20">Financial </option><option title="Includes: Food, Drinks, Cooking, Recipies, etc." value="34">Foods &amp; Culinary</option><option title="Includes: Bingo, Online Casinos, etc." value="70">Gambling</option><option title="Includes: Exercise, Fitness, Healthy Living, etc." value="54">Health &amp; Fitness</option><option title="Includes: Health and Medical Tips, Information, and Resources" value="55">Health Care &amp; Medical</option><option title="Includes: Home Improvement, Landscaping, etc." value="56">Home Products &amp; Services</option><option title="Includes: Internet Services Such as Hosting, Web Design, Etc." value="57">Internet Services</option><option title="Includes: Legal Advice and Information Relating to the Law" value="58">Legal</option><option title="" value="69">Miscellaneous</option><option title="Includes: Beauty Products, Weightloss Products, etc." value="59">Personal Product &amp; Services</option><option title="Includes: Information about Animal Care, Pets, and Pet Products" value="60">Pets &amp; Animals</option><option title="Includes: Real Estate Tips, Rentals, Homes for Sale, Etc." value="62">Real Estate</option><option title="Includes: Dating, Relationship Advice, Weddings, etc." value="63">Relationships</option><option title="Includes: Information about Software and Software Companies" value="64">Software</option><option title="Includes: Information about Sports and Athletics" value="65">Sports &amp; Athletics</option><option title="Includes: Gadgets, Computers, and Other Technology Topics" value="66">Technology</option><option title="Includes: Travel Tips, Tourism, Vacation Spots, etc." value="67">Travel </option><option title="Includes: Information and Tips about Web Development, Coding, Etc." value="68">Web Resources</option></select>
    <p class="help-block">Example block-level help text here.</p>
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
<div><h3>Link Placement Schedule</h3></div>
 <div class="form-group">
    <label for="exampleInputFile">Make Links (?):</label>
    <select name="Schedule" id="Schedule" onchange="SwitchPerDaySet(this)">
         <option value="instant" selected="">All-at-once</option>
         <option value="1day">Daily</option>
         <option value="7days">Weekly</option>
         <option value="30days">Monthly</option>
         </select>
  </div>

<div class="panel panel-default">
  <div class="panel-body">
<div><h3>Configure Link Queue(s)</h3></div>
<div class="form-group">
    <label for="exampleInputFile">Link Anchor Text (?):</label>
 <input type="text" name="strLinkAnchor[]" id="strLinkAnchor0" maxlength="255" value="" style="width: 200px" placeholder="Anchor Text" class="tm-input" data-original-title="">
 </div>
 <div class="form-group">
    <label for="exampleInputFile">Blog Keywords (?):</label>
 <input type="text" name="strSearchPrase[]" id="strSearchPrase" maxlength="255" value="" style="width: 200px">
 </div>
 <div class="form-group">
    <label for="exampleInputFile">Number of links (?):</label>
 <input type="text" name="lngNumLinks[]" id="lngNumLinks" maxlength="10" value="" style="width: 30px">
 </div>
 <div class="form-group">
    <label for="exampleInputFile">Maximum Budget (?):</label>
<input type="text" name="lngMaxBudget[]" id="lngMaxBudget" maxlength="10" value="" style="width: 30px"> 
 </div>
 </div>
</div>
<div><button class="btn btn-mini btn-primary" type="button" name="addblock"><i class="icon-plus icon-white"></i> Add Another Queue with a Different Configuration</button></div>
<div><h3>Link Campaign Summary</h3></div>
 <div class="form-group">
    <label for="exampleInputFile">Total Number of Links (?):</label>
 
 </div>
<div class="form-group">
    <label for="exampleInputFile">Available Credits (?):</label>
 
 </div>
<div class="form-group">
    <label for="exampleInputFile">Min Links Cost (?):</label>
 
 </div>
<div class="form-group">
    <label for="exampleInputFile">Total Maximum Budget: (?):</label>
 
 </div>



  <button type="submit" class="btn btn-default">Submit</button>
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