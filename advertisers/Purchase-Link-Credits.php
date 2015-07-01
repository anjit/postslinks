<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>
<?php 
$user_id=$_SESSION['user_id'];
print_r($_SESSION);
?>
<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Purchase Link Credits</h3>

</div>
<div class="box-body">
<div class="col-12">
<p>To purchase monthly recurring credits, please enter the total number of credits you want and click "purchase". Please note your payment rebills automatically each month to pay for existing links and link credits. The monthly recurring payment does not add new credits to your account each month.</p>
<p>Discounts are available for high quantity purchases, please contact us for more information.</p> 

<p>Please Note: Your payment will be re-billed each month until you request a cancelation. All credits expire at the end of each monthly billing cycle (whether they are used or not) and cannot be rolled over into future months. For example, if you purchase 1,000 credits and use only 750 during the month, you are still re-billed for 1,000 credits.</p>
</div>
<div class="col-12">
<form role="form" action='https://www.sandbox.paypal.com/cgi-bin/webscr' method="post" class="form-horizontal">
<input type="hidden" name="cmd" value="_xclick">
<!-- <input type="hidden" name="hosted_button_id" value="221"> -->
<input type="hidden" name="business" value="anjit.k-facilitator@webreinvent.com">
<input type="hidden" name="item_name" id="item_name" value="Basic Membership">
<input type="hidden" name="userid" value="<?=$user_id;?>">
<input type="hidden" name="email" value="<?=$_SESSION['email'];?>">
<input type="hidden" name="amount" id="amount" value="49">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="return" value="http://afydemo.com/anjit/postslinks/advertisers/order-process">
<input type='hidden' name='rm' value='2'>

<div class="box-body">
<div class="form-group">
<label class="col-sm-2 control-label">Name:</label>
<div class="col-sm-10">
<input type="hidden" name="first_name" value="<?=$_SESSION[username]?>">	
<?=$_SESSION[username]?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Number of credits:</label>
<div class="col-sm-10">
<select name="cred" id="cred" onchange="re_calc(this.value)" class="form-control">
<option value="Basic Membership" >Basic Membership (1000 credits)</option>
<option value="Plus Membership">Plus Membership (5000 credits)</option>
<option value="SEO Pro Membership">SEO Pro Membership (25000 credits)</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Payment method:</label>
<div class="col-sm-10">
<select id="gateway" name="gateway" onchange="re_calc();" class="form-control">
<option value="paypal">PayPal</option>
<option value="2co">Credit Card (2checkout.com)</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Price:</label>
<div class="col-sm-10">
<span style="color:red; font-weight: bold" id="price">$49</span>
<span style="color:red; font-weight: bold" id="month">/Month</span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"></label>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div><!-- /.box-body -->
</form>
</div>
<div class=" col-12 with-border">
<h1>Quality Links for Low Monthly Prices!</h1>

<div class="box table-responsive">
<div class="box-header">
<h3 class="box-title"><h3>PageRank Pricing </h3>
</div><!-- /.box-header -->
<div class="box-body">
<table class="table table-bordered">
<tbody><tr>
<th>PageRank</th>
<th>Credits per Month</th>
</tr>
<tr>
<td>PR 1</td>
<td><span class="badge bg-red">1</span></td>
</tr>
<tr>
<td>PR 2</td>
<td><span class="badge bg-yellow">5</span></td>
</tr>
<tr>
<td>PR 3</td>
<td><span class="badge bg-light-blue">10</span></td>
</tr>
<tr>
<td>PR 4</td>
<td><span class="badge bg-green">20</span></td>
</tr>
<tr>
<td>PR 5 +</td>
<td><span class="badge bg-green">40</span></td>
</tr>
</tbody></table>
</div><!-- /.box-body -->

</div>

<div class="table-responsive">
<div class="box-header">
<h3 class="box-title"><h3>Domain Authority Pricing</h3>
</div><!-- /.box-header -->
<div class="box-body">
<table class="table table-bordered">
<tbody><tr>
<th>MOZ DA</th>
<th>Credits per Month</th>
</tr>
<tr>
<td>DA 10-15</td>
<td><span class="badge bg-red">1</span></td>
</tr>
<tr>
<td>DA 16-21</td>
<td><span class="badge bg-yellow">5</span></td>
</tr>
<tr>
<td>DA 22-27</td>
<td><span class="badge bg-light-blue">10</span></td>
</tr>
<tr>
<td>DA 28-34</td>
<td><span class="badge bg-green">20</span></td>
</tr>
<tr>
<td>DA 35+</td>
<td><span class="badge bg-green">40</span></td>
</tr>
</tbody></table>
</div><!-- /.box-body -->
</div>
<div class="table-responsive">
<div class="box-header">
<h3 class="box-title"><h3>Outsource Articles to Our Team of Professional Writers!</h3>
</div><!-- /.box-header -->
<div class="box-body">
<table class="table table-bordered">
<tbody><tr>
<th>Type</th>
<th>Length</th>
<th># of Keywords/Links</th>
<th>Price</th>
<th>Sample</th>
</tr>
<tr>
<td>Blurb</td>
<td>100 words</td>
<td><span class="badge bg-red">1</span></td>
<td><span class="badge bg-red">$3</span></td>
<td><a href="help_blurb_sample.txt" target="_blank">View Sample </a></td>
</tr>
<tr>
<td>Article</td>
<td>350-400 words</td>
<td><span class="badge bg-yellow">2</span></td>
<td><span class="badge bg-yellow">$8</span></td>
<td><a href="help_blurb_sample.txt" target="_blank">View Sample </a></td>
</tr>

</tbody></table>
</div><!-- /.box-body -->

</div>
</div>
</div><!-- /.box-body -->


</div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include('main-footer.php');?>
<script type="text/javascript">
function re_calc(val){

$('#item_name').val(val);

if(val=='Plus Membership'){
$('#price').text('$149');
$('#amount').val('149');

}
if(val=='SEO Pro Membership'){
$('#price').text('$499');
$('#amount').val('499');
}
if(val=='Basic Membership'){
$('#price').text('$49');
$('#amount').val('49');
}
}
</script>