<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Admin_Tanya extends \Aplikasi\Kitab\Tanya
{
#=====================================================================================================
	public function __construct()
	{
		parent::__construct();
	}
#---------------------------------------------------------------------------------------------------#
	function data_contoh($pilih)
	{
		$data = array(
			'namaPendek' => 'james007',
			'namaPenuh' => 'Polan Bin Polan',
			'level' => 'pelawat'
		); # dapatkan medan terlibat
		$kira = 1; # kira jumlah data

		return ($pilih==1) ? $kira : $data; # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	public function susunPembolehubah($pilih)
	{
		if($pilih == 'login'):
			list($myTable, $medan, $carian, $susun) = $this->jadualLogin();
		elseif($pilih == 'product'):
			list($myTable, $medan, $carian, $susun) = $this->jadualProduct();
		elseif($pilih == 'report'):
			list($myTable, $medan, $carian, $susun) = $this->jadualReport();
		else:
			$myTable = $medan = $carian= $susun = null;
		endif;

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualLogin()
	{
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		$medan = $medan . ', id as Action';
		$carian = $susun = null;
		# semak database
			$carian[] = array('fix'=>'xlike', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'username', # cari dalam medan apa
				'apa' => 'admin'); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => 'level', # cari dalam medan apa
				'apa' => 'admin2'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualProduct()
	{
		//list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_product');
		$myTable = 'test_product'; $medan = '*, id as Action';
		$carian = $susun = null;
		/*# semak database
			$carian[] = array('fix'=>'xlike', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'username', # cari dalam medan apa
				'apa' => 'admin'); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => 'level', # cari dalam medan apa
				'apa' => 'admin2'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
	function jadualReport()
	{
		//list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_report');
		$myTable = 'test_report'; $medan = '*, id as Action';
		$carian = $susun = null;
		/*# semak database
			$carian[] = array('fix'=>'xlike', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => 'username', # cari dalam medan apa
				'apa' => 'admin'); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => 'level', # cari dalam medan apa
				'apa' => 'admin2'); # benda yang dicari//*/

		return array($myTable, $medan, $carian, $susun); # pulangkan nilai
	}
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
#---------------------------------------------------------------------------------------------------#
#=====================================================================================================
}