<?php
require_once('controllers/admin/base_controller.php');
class CartsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => 'active', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'carts';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}
}