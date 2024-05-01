<?php
require_once('controllers/main/base_controller.php');
// require_once('models/feature.php');
// require_once('models/product.php');
// require_once('models/cart.php');
class LayoutsController extends BaseController
{
	public $activeArr = array('homeActive' => 'active', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'layouts';
	}

	public function index()
	{
		$this->render('index', $this->activeArr);
	}
}
