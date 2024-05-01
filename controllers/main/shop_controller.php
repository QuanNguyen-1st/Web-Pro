<?php
require_once('controllers/main/base_controller.php');
// require_once('models/product.php');
// require_once('models/cart.php');
class ShopController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => 'active', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'shop';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}

	public function add()
	{
		
	}

	// public function product()
	// {
	// 	$this->render('product');
	// }
}
