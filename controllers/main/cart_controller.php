<?php
require_once('controllers/main/base_controller.php');
require_once('models/stock.php');
require_once('models/cart.php');
require_once('models/product.php');
require_once('models/coupon.php');
class CartController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => 'active');
	function __construct()
	{
		$this->folder = 'cart';
	}

	public function index()
	{
		session_start();
		$email = $_SESSION['guest'];
		$products = [];

		if (!isset($_POST['coupon'])) {
			$data = array('activeArr' => $this->activeArr, 'products' => $products);
			$this->render('index', $data);
		} else {
			$coupon_code = null;
			// $coupon_code = Coupon::getCoupon($_POST['coupon']);
			if ($coupon_code === null) {
				$data = array('activeArr' => $this->activeArr, 'products' => $products);
				$this->render('index', $data);
			} else {
				$data = array('activeArr' => $this->activeArr, 'products' => $products, 'coupon' => $coupon_code);
				$this->render('index', $data);
			}
		}
	}

	public function add() {

		exit();
	}

	public function delete() {
		$cart_id = $_POST['cart_id'];
		Coupon::delete($cart_id);
		
		header('Location:index.php?page=main&controller=cart&action=index');
	}

	public function purchase() {
		
		
		header('Location:index.php?page=main&controller=cart&action=index');
	}
}
