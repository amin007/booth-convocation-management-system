<?php
include('config.php');
include('header1.php');
?>

<div class="content">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="card">
	
	<fieldset>
	<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
	<tr><td colspan="2" align="center"><div class="sub-tajuk-kelabu">
		VIEW QUANTITY PRODUCT</div></td></tr>
	</table>
	<center>
		<form action="" method="POST" align="center"><br>
			<span id="sprytextfield2">
				<input type="text" class="input" name="query" placeholder="search" />
			</span>
			<button type="submit" name="cari" class="butangadmin"><span>Search</span></button>
		</form>
	</center>
		
	<br>

	<form action="pendingbooking.php" method="post">
	<table id="example" class="display" border="2" align="center">
	<tr style="font-weight:bold;">
	<!--<td align="center">DATE CRITERIA</td></center>
	<td align="center">PRODUCT NO</td></center>-->
	<td align="center">ID VENDOR</td>
	<td align="center">SSM</td>
	<td align="center">DATE&nbsp;OF&nbsp;SSM</td>
	<td align="center">NO OF BUSINESS LICENSE</td>
	<td align="center">DATE OF BUSINESS LICENSE</td>
	<td align="center">DATE OF THYPOID INJECTION</td>
	<td align="center">DATE OF FOOD<br>HANDLING CERTIFICATE</td>
	<!--<td align="center">PROCESS FEES</td>-->
	<td align="center">ACTION</td>
	</tr>
<?php
$no = 1;
$query = !isset($_POST['query']) ? null : $_POST['query'];
$noSSM = !isset($_GET['ssm']) ? null : $_GET['ssm'];
#-----------------------------------------------------------------------------------------------------------
$medan = 'datecriteria,idproduct,dateresult,ssm,datessm,expdatessm,
lesenberniaga,datelesenberniaga,expdatelesenberniaga,
suntikan,expdatesuntikan,sijilpmakanan,
/*image,imagename,*/ "" as image,imagename,
status,idvendor';
$myTable = 'test3_criteria';
#-----------------------------------------------------------------------------------------------------------
if($query != '')
{
	$select = mysqli_query($connect, "SELECT $medan FROM $myTable"
	. " WHERE datecriteria LIKE '$query' "
	. " OR idproduct LIKE '$query' "
	. " OR ssm LIKE '$query' ");
}
elseif($noSSM != '')
{# cari guna $_GET
	$select = mysqli_query($connect, "SELECT $medan FROM $myTable"
	. " WHERE ssm='$noSSM' ");
}
else
{# paparkan semua data dalam mysql dulu
	$select = mysqli_query($connect, "SELECT $medan FROM $myTable"
	. "");
}
#-----------------------------------------------------------------------------------------------------------
if(mysqli_num_rows($select))
{
	//while($row = mysqli_fetch_row($select))
	while($row = mysqli_fetch_assoc($select))
	//while($row = mysqli_fetch_array($select))
	{
		//$data[] = $row;
		include 'papar_jadual.php';
		$no++;
	}//include 'papar_tatasusunan.php';
}
else
{
	echo '<tr><td colspan="8" align="center">No Data</td></tr>';
}
#-----------------------------------------------------------------------------------------------------------
?>
	</table>
	</form>
<br>

	</div><!-- /  class="card">
	</div><!-- /  class="col-md-12">
	</div><!-- /  class="row">
	</div><!-- /  class="container-fluid">
</div><!-- / class="content" -->

<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/popper.js/popper.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="./vendor/chart.js/chart.min.js"></script>
<script src="./js/carbon.js"></script>
<script src="./js/demo.js"></script>
</body>
</html>