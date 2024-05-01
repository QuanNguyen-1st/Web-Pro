<?php
require_once('controllers/main/base_controller.php');
class ShopController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => 'active', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'shop';
	}

	public function index()
	{
		$this->render('index', $this->activeArr);
	}

	// public function product()
	// {
	// 	$this->render('product');
	// }
}
