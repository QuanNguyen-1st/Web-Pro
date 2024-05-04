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
		$procart = [];
		$products = [];
		$cart = [];

		$procart = Product::getUserCart($email);
		$products = $procart['products'];
		$cart = $procart['cart'];

		if (!isset($_POST['coupon'])) {
			$data = array('activeArr' => $this->activeArr, 'products' => $products, 'cart' => $cart);
			$this->render('index', $data);
		} else {
			$coupon_code = null;
			$coupon_code = Coupon::getCoupon($_POST['coupon']);
			if ($coupon_code === null) {
				$data = array('activeArr' => $this->activeArr, 'products' => $products, 'cart' => $cart);
				$this->render('index', $data);
			} else {
				$data = array('activeArr' => $this->activeArr, 'products' => $products, 'cart' => $cart, 'coupon' => $coupon_code);
				$this->render('index', $data);
			}
		}
	}

	public function add() {
		$product_id = $_POST['product_id'];
        $img = $_POST['img'];
        $size = $_POST['size'];
        $amount = $_POST['amount'];

		if (Stock::checkAvail($product_id, $size, $img, $amount)) {
			session_start();
			$email = $_SESSION['guest'];
			Cart::insert($email, $product_id, $size, $img, $amount);
			echo 'success';
			exit();
		} else {
			echo 'Not enough stocks';
			exit();
		}
		
	}

	public function delete() {
		$cart_id = $_POST['cart_id'];
		Cart::delete($cart_id);
		
		header('Location:index.php?page=main&controller=cart&action=index');
	}

	public function purchase() {
		$cart_ids = $_POST['cart_ids'];
		$amounts = $_POST['amounts'];

		$carts = [];

		foreach ($cart_ids as $cart_id) {
			$carts[] = Cart::get($cart_id);
		}

		for ($i = 0; $i < count($carts); $i++) {
			if (Stock::checkAvail(
				$carts[$i]->product_id,
				$carts[$i]->size,
				$carts[$i]->img,
				$carts[$i]->amount
			)) {
				Cart::update($cart_ids[$i], $amounts[$i])
			}
			else 
			{
				echo 'Not enough stocks';
				exit();
			};	
		}

		if (!isset($_POST['coupon'])) {
			for ($i = 0; $i < count($cart_ids); $i++) {
				Cart::makePurchase($cart_ids[$i], null);
				Stock::update(
					$carts[$i]->product_id,
					$carts[$i]->size,
					$carts[$i]->img,
					$carts[$i]->amount
				);
			}
		} else {
			$coupon = $_POST['coupon'];
			for ($i = 0; $i < count($cart_ids); $i++) {
				Cart::makePurchase($cart_ids[$i], $coupon);
				Stock::update(
					$cart_ids[$i]->product_id,
					$cart_ids[$i]->size,
					$cart_ids[$i]->img,
					$carts[$i]->amount
				);
			}
			Coupon::use($coupon);
		}
		echo 'success';
		
		header('Location:index.php?page=main&controller=cart&action=index');
	}
}
