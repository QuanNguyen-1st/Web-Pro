<?php
require_once('controllers/admin/base_controller.php');
require_once('models/stock.php');
class StocksController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => 'active', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'stocks';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}

	public function add() {
		
	}
}