<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class Borang01_Tambah
{
#==========================================================================================
###########################################################################################
	public function medanCarian($pindah, $class = 'col-sm-7')
	{
		list($method, $myTable, $senarai, $cariID, $_jadual) = $pindah;

		if($method == 'biodata'):
			$this->medanTajuk($myTable, $class);
		elseif($method == 'rangka'):
		else:
			$this->atasLabelSyarikat();
			list($mencari, $carian, $mesej) =
				$this->atasSemakData($senarai, $cariID, $_jadual);
			$this->atasInputCarian($mencari, $carian, $mesej, $class);
		endif;
	}
#------------------------------------------------------------------------------------------
	public function medanTajuk($myTable, $class = 'col-sm-7')
	{
		echo "\n"; $class = 'col-sm-8';
?><div class="container">
<div class="form-group"><div class="<?php echo $class ?>">
	<div class="input-group input-group-lg">
	<span class="input-group-addon">Jadual <?php echo $myTable ?></span>
	</div>
</div></div>
</div><br><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function medanHantar($myTable, $class = 'col-sm-7')
	{
		$class = 'col-sm-8';
		?><div class="form-group">
	<div class="<?php echo $class ?>">
		<!--label for="inputSubmit" class="col-sm-3 control-label"><?=$myTable?></label -->
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
			<input type="hidden" name="jadual" value="<?php echo $myTable ?>">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary btn-large">
			<!-- input type="reset" name="Reset" value="Reset" class="btn btn-default btn-large" -->
		</span>
		</div>
	</div>
</div><?php
	}
#------------------------------------------------------------------------------------------
	public function atasLabelSyarikat()
	{
		echo "\n"; ?><style>
.floating-menu {
	padding: 5px;; width: 300px; z-index: 100;
	position: fixed; bottom: 0px; right: 0px;
}
</style><?php echo "\n";
	}
#------------------------------------------------------------------------------------------
	public function atasSemakData($senarai, $cariID, $_jadual)
	{
		if(isset($senarai['kes'][0]['newss'])):
			# set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = $cariID;
			$mesej = ''; //$carian .' ada dalam ' . $this->_jadual;
			else: # set pembolehubah
			$mencari = URL . 'kawalan/ubahCari/';
			$carian = null;
			$mesej = '::' . $cariID . ' tiada dalam ' . $_jadual;
		endif;

		return array($mencari, $carian, $mesej);
	}
#------------------------------------------------------------------------------------------
	public function atasInputCarian($mencari, $carian, $mesej, $class)
	{
		echo "\n";?><div class="container">
<form method="GET" action="<?=$mencari;?>" class="form-inline" autocomplete="off">
<div class="form-group row">
	<label for="carian"><h1>Ubah Kawalan<?=$mesej?></h1></label>
	<div class="input-group">
		<input type="text" name="cari" value="<?=$carian;?>"
		class="form-control" id="inputString"
		onkeyup="lookup(this.value);" onblur="fill();">
		<span class="input-group-addon"><input type="submit" value="mencari"></span>
	</div>
</div>
<div class="suggestionsBox" id="suggestions" style="display: none;">
	<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
</div>
</form></div><br><?php echo "\n";
	}
###########################################################################################
#------------------------------------------------------------------------------------------
	public function baruInput($jadual,$key,$data,$type,$pri)
	{
		# istihar pembolehubah
		$name = 'name="' . $jadual . '[' . $key . ']"';
		# css
		list($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
			$classInput,$komenInput) = $this->ccs();

		if(in_array($key,array('entahlah')))
			$input = $tab2 . 'Entahlah';
		elseif(in_array($key,array('state','negeri','Category Product'))) # untuk dropmene negeri
			$input = $this->inputDropmenu($tab2, $tab3, $name, $data,
			$classInput, $komenInput, $key);
		elseif ( in_array($key,array('password','kataLaluan')) )
			$input = $this->inputPassword($tab2, $tab3, $name, $data,
				$classInput, $komenInput, $jadual, $key);
		elseif ( in_array($key,array('name','Id Admin','idUser')) ) # untuk data session
			$input = $this->inputSesi($tab2, $tab3, $name);
		elseif(in_array($pri,array('PRI')))
			$input = 'primary-key';
		elseif(in_array($type,array('varchar')))
			$input = $this->inputTeksBesar($tab2, $tab3, $name, null,
				$classInput, $komenInput);
		elseif(in_array($type,array('text'))) #kod utk textarea
			$input = $this->inputTextarea($tab2, $name, null);
		elseif(in_array($type,array('int','double')))
			$input = $this->inputNumber($tab2, $tab3, $name, null,
				$classInput, $komenInput);
		elseif ( in_array($type,array('date')) )
			$input = $this->inputTarikh($tab2, $tab3, $name, $data,
			$classInput, $komenInput, $jadual, $key);
		elseif ( in_array($type,array('blob')) )
			$input = $this->inputMuatnaik($tab2, $tab3, $name, $data,
			$classInput, $komenInput, $jadual, $key);
		else
		{#kod untuk lain2
			$input = $tab2 . '<p class="form-control-static text-info">'
				   . $data . '</p>';
		}

		return $input; # pulangkan nilai
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	function ccs()
	{
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$tab4 = "\n\t\t\t\t";
		# butang
		$birutua = 'btn btn-primary btn-mini';
		$birumuda = 'btn btn-info btn-mini';
		$merah = 'btn btn-danger btn-mini';
		//$classInput = 'input-group input-group'; # 3.3.7
		//$komenInput = '<!-- / "input-group input-group" -->';
		$classInput = 'input-group mb-3'; # 4.1.1
		$komenInput = '<!-- / "input-group mb-3" -->';
		# tatasusunan
		$medanLogin = array('username','fullusername','level',
		'phoneno','address1','address2','city','postcode');

		return array($tab2,$tab3,$tab4,$birutua,$birumuda,$merah,
		$classInput,$komenInput,$medanLogin);
	}
#------------------------------------------------------------------------------------------
	function labelBawah($data)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$input2 = ($data==null) ? '' :
			'<span class="input-group-text" id="basic-addon2">'
			. $data . '</span>'
			. $tab2;

		return $input2;
	}
#------------------------------------------------------------------------------------------
	function labelBawah3($data)
	{
		$input2 = null;
		$tab2 = "\n\t\t";
		$tab3 = "\n\t\t\t";
		$input2 = ($data==null) ? '' :
			'<div class="input-group-append">'
			. '<span class="input-group-text" id="basic-addon2">'
			. $tab3 . $data . $tab3 . '</span>'
			. '</div><!-- / class="input-group-append" -->'
			. $tab2;

		return $input2;
	}
#------------------------------------------------------------------------------------------
###########################################################################################
#------------------------------------------------------------------------------------------
	function inputTextarea($tab2, $name, $data)
	{
		return ''
		. '<div class="input-group">' . $tab2
		//. '<div class="input-group-prepend">'
		//. $tab2 . '<span class="input-group-text">With textarea</span>'
		//. $tab2 . '</div>' . $tab2
		. '<textarea ' . $name . ' rows="3" cols="20"' . $tab2
		. ' class="form-control"></textarea>' . $tab2
		. '</div><!-- class="input-group" -->'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputPassword($tab2, $tab3, $name, $data, $classInput, $komenInput,
		$jadual, $key)
	{
		$name2 = 'name="' . $jadual . '[' . $key . 'X]"';

		return ''
		//'<div class="input-group input-group-sm">' . $tab3
		//. '<span class="input-group-addon"></span>' . $tab3
		. '<input type="password" ' . $name	. $tab3
		. ' placeholder="Taip kata laluan" class="form-control">'
		. '<input type="password" ' . $name2 . $tab3
		. ' placeholder="Taip lagi sekali" class="form-control">'
		//. $tab2 . '</div>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputSesi($tab2, $tab3, $name)
	{
		list($idUser,$namaPendek) = $this->dataSesi();
		$data = $idUser . '-' . $namaPendek;

		return ''
		. '<div class="input-group mb-3">'
		//. $tab3 . '<div class="input-group-prepend"><span class="input-group-text">'
		//. $tab3 . 'idUser = ' . $idUser . '-' . $namaPendek
		//. $tab3 . '</span></div>' . $tab3
		. '<input type="text" ' . $name . ' value="' . $data . '"'
		. ' class="form-control" readonly>'
		//. '<input type="hidden" ' . $name . ' value="' . $data . '">'
		. $tab2 . '</div>'
		. '';
	}
#------------------------------------------------------------------------------------------
	function dataSesi()
	{
		$Sesi = new \Aplikasi\Kitab\Sesi();
		$Sesi->init();
		$idUser = $Sesi->get('idUser');
		$namaPendek = $Sesi->get('namaPendek');
		//echo '<pre>'; print_r($_SESSION) . '</pre>';
		/*echo 'namaPendek=' . $Sesi->get('namaPendek') . '<br>';
		echo 'namaPenuh=' . $Sesi->get('namaPenuh') . '<br>';
		echo 'idUser=' . $Sesi->get('idUser') . '<br>';
		echo 'email=' . $Sesi->get('email') . '<br>';
		echo 'levelPengguna=' . $Sesi->get('levelPengguna') . '';//*/

		return array($idUser,$namaPendek);
	}
#------------------------------------------------------------------------------------------
	function inputNumber($tab2, $tab3, $name, $data = 'Number Only',
		$classInput, $komenInput)
	{
		return ''//'<div class="input-group input-group-sm">' . $tab2
		. '<div class="' . $classInput . '">' . $tab2
		. '<span class="input-group-text" id="basic-addon2">Number Only</span>'
		. '<input type="text" ' . $name
		. ' placeholder="' . $data . '"'
		. ' class="form-control">' . $tab2
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTarikh($tab2, $tab3, $name, $data, $classInput, $komenInput,
		$jadual, $key)
	{
		return '<div class="input-group input-group-sm">' . $tab3
		. '<input type="date" ' . $name //. 'class="input-date tarikh" readonly>'
		. $tab3 . ' class="form-control date-picker"'
		. $tab3 . ' placeholder="Cth: 2014-05-01"'
		. $tab3 . ' id="date' . $key . '" data-date-format="yyyy/mm/dd"/>'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputMuatnaik($tab2, $tab3, $name, $data, $classInput, $komenInput,
		$jadual, $key)
	{
		$komenInput2 = '<!-- / class="input-group-prepend" -->';
		return ''//'<div class="' . $classInput . '">' . $tab2
		. '<!-- //////////////////////////////////////////////////////////////////////// -->'
		//. $tab2 . '<div class="input-group-prepend">'
		//. $tab3 . '<span class="input-group-text">Picture:</span>'
		//. $tab2 . '</div>' . $komenInput2
		. $tab2 . '<div class="custom-file">'
		. $tab3 . '<input type="file" class="custom-file-input">'
		. $tab3 . '<label class="custom-file-label">Choose file</label>'
		. $tab2 . '</div>' . $tab2
		. '<!-- //////////////////////////////////////////////////////////////////////// -->'
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksBesar($tab2, $tab3, $name, $data, $classInput, $komenInput)
	{
		#kod utk input text saiz besar
		return '<div class="input-group input-group-lg">' . $tab3
		//. '<span class="input-group-addon">' . $data . '</span>' . $tab3
		. '<input type="text" ' . $name
		. ' placeholder="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksKecil($tab2, $tab3, $name, $data, $classInput, $komenInput)
	{
		#kod utk input text saiz besar
		return '<div class="input-group input-group-sm">' . $tab3
		//. '<span class="input-group-addon">' . $data . '</span>' . $tab3
		. '<input type="text" ' . $name
		. ' placeholder="' . $data . '"'
		. ' class="form-control">'
		. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputTeksTakData($tab2, $tab3, $name)
	{
		#kod utk input text saiz besar
		return ''
		//'<div class="input-group input-group">' . $tab3
		//. '<span class="input-group-addon"></span>' . $tab3
		. '<input type="text" ' . $name
		. ' class="form-control">'
		//. $tab2 . '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function inputJadual($paparSahaja)
	{
		//echo '$paparSahaja-><pre>'; print_r($paparSahaja) . '<pre>';
		//var_export($paparSahaja) . '<pre>';
		# set nama class untuk jadual
		$jadual1 = ' table-striped'; # tambah zebra
		$jadual2 = ' table-bordered';
		$jadual3 = ' table-hover';
		$jadual4 = ' table-condensed';
		$classJadual = 'table' . $jadual4 . $jadual3;
		$header = $id = null;

		foreach ($paparSahaja as $myTable => $bilang)
		{# mula ulang $bilang
			//echo "<h1>$myTable</h1>";
			Html_Table::papar_jadual($bilang, $myTable,
			$pilih=5, $classJadual, $header = 'abc', $id);
		}# tamat ulang $bilang //*/
		echo "\n";

		return '';
	}
#------------------------------------------------------------------------------------------
	function inputDropmenu($tab2, $tab3, $name, $data, $classInput, $komenInput,
		$key)
	{
		return $tab2 . '<div class="'.$classInput.'">' . $tab3
		. $this->pilihDropmenu($key,$name,$data) . $tab3
		. '</div>' . $komenInput
		. '';
	}
#------------------------------------------------------------------------------------------
	function pilihDropmenu($key,$name,$data = null)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';

		if($key=='state' Or $key=='negeri')
			$inputDrop = $this->selectNg($name,$data);
		elseif($key=='Category Product')
			$inputDrop = $this->selectCategory($name,$data);
		else
			$inputDrop = $key . '|' . $name;

		return $inputDrop;
	}
#------------------------------------------------------------------------------------------
	function selectNg($name,$data)
	{
		$negeri = array('Johor','Melaka','Negeri Sembilan',
			'Selangor','Putrajaya','Kuala Lumpur','Labuan',
			'Perak','Pulau Pinang','Kedah','Perlis',
			'Kelantan','Terengganu','Pahang',
			'Sabah','Sarawak','Lain-lain');
		//$select .= '<option value="" selected="selected">-- Choose State --</option>';
		$option = '';
		foreach($negeri as $ng):
			$terpilih = ($ng == $data) ? ' selected="selected">*' : '>';
			$option .= '<option value="' . $ng .'"' . $terpilih
			. $ng . '</option>';
		endforeach;
		$select = '<select  ' . $name . ' class="form-control">'
		. $option . '</select>';

		return $select;
	}
#------------------------------------------------------------------------------------------
	function selectCategory($name,$data)
	{
		$pilih = array(
			'food' => 'Food & Drink',
			'flower' => 'Flower',
			'clothes' => 'Clothes',
			'cosmetic' => 'Cosmetic'
			);
		//$select .= '<option value="" selected="selected">-- Choose State --</option>';
		$option = '';
		foreach($pilih as $kunci => $mangga):
			$terpilih = ($mangga == $data) ? ' selected="selected">*' : '>';
			$option .= '<option value="' . $kunci .'"' . $terpilih
			. $mangga . '</option>';
		endforeach;
		$select = '<select  ' . $name . ' class="form-control">'
		. $option . '</select>';

		return $select;
	}
#------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------
#==========================================================================================
}