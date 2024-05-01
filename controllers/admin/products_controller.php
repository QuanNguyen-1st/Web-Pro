<?php
require_once('controllers/admin/base_controller.php');
class ProductsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => 'active', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '');
	function __construct()
	{
		$this->folder = 'products';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}
}