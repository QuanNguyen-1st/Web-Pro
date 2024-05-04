<?php
require_once('controllers/admin/base_controller.php');
require_once('models/coupon.php');
class CouponsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => 'active');
	function __construct()
	{
		$this->folder = 'coupon';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}

	public function add() {
		
	}
}