<?php
$mencari = null;
$butangHantar = 'Search';
?>
<div class="container">
	<div align="center"><form method="GET" action="<?=$mencari?>"
	class="form-inline" autocomplete="off">
	<?php //echo $mencari . '<br>' . "\r" ?>
	<div class="form-group row"><div class="input-group">
		<input type="text" name="cari" class="form-control" autofocus
		placeholder="Search : "
		id="inputString" onkeyup="lookup(this.value);" onblur="fill();">
		<div class="input-group-append"><span class="input-group-text" id="basic-addon2">
			<input type="submit" value="<?=$butangHantar?>">
		</span></div><!-- / class="input-group-append" -->
	</div></div>
	<div class="suggestionsBox" id="suggestions" style="display: none; " >
		<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
	</div>
	</form></div><br>

</div><!-- / class="container" -->
