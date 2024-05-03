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
		$currentPage = isset($_GET['pg']) ? $_GET['pg'] : 1;
        $itemsPerPage = 25;

		$products = [];

		$totalPages = ceil(count($products) / $itemsPerPage);
		$startIndex = ($currentPage - 1) * $itemsPerPage;
		$endIndex = $startIndex + $itemsPerPage;

		$products = array_slice($products, $startIndex, $endIndex);

		$data = array('activeArr' => $this->activeArr, 'products' => $products, 'currentPage' => $currentPage, 'totalPages' => $totalPages);
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
