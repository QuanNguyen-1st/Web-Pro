<?php
require_once('controllers/admin/base_controller.php');
require_once('models/cart.php');
class CartsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => 'active', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'carts';
	}

	public function index()
	{
		$carts = Cart::getAll();
		$data = array('activeArr' => $this->activeArr, 'carts' => $carts);
		$this->render('index', $data);
	}

	public function delete()
	{
		Cart::delete($_POST['id']);
		header('Location: index.php?page=admin&controller=carts&action=index');
	}
}