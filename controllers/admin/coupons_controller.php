<?php
require_once('controllers/admin/base_controller.php');
require_once('models/coupon.php');
class CouponsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => 'active');
	function __construct()
	{
		$this->folder = 'coupon';
	}

	public function index()
	{
		$coupons = Coupon::getAll();
		$data = array('activeArr' => $this->activeArr, 'coupons' => $coupons);
		$this->render('index', $data);
	}

	public function add() {
		$generatedCode = Coupon::radomString(6);

		while (Coupon::check($generatedCode)) {
			$generatedCode = Coupon::radomString(6);
		}

		$stock = $_POST['stock'];
		$discount = $_POST['discount'];
		$expireAt = $_POST['expireDate'];

		Coupon::insert($stock, $generatedCode, $discount, $expireAt);
		header('Location: index.php?page=admin&controller=coupons&action=index');
	}

	public function edit() {
		$coupon_id = $_POST['id'];
		$stock = $_POST['stock'];
		$discount = $_POST['discount'];
		$expireAt = $_POST['expireDate'];

		Coupon::update($coupon_id, $stock, $discount, $expireAt);

		header('Location: index.php?page=admin&controller=coupons&action=index');
	}

	public function delete() {
		$coupon_id = $_POST['id'];
		Coupon::delete($coupon_id);
		header('Location: index.php?page=admin&controller=coupons&action=index');
	}

	
}