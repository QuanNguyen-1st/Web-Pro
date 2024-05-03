<?php
require_once('controllers/main/base_controller.php');
// require_once('models/cart.php');
// require_once('models/product.php');
class CartController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => 'active');
	function __construct()
	{
		$this->folder = 'cart';
	}

	public function index()
	{
		// $email = $_SESSION['guest'];

		$products = [];
		$data = array('activeArr' => $this->activeArr, 'products' => $products);
		$this->render('index', $data);
	}
}
