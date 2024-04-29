<?php
require_once('controllers/main/base_controller.php');

class ShopController extends BaseController
{
	function __construct()
	{
		$this->folder = 'shop';
	}

	public function index()
	{
		$this->render('index');
	}

	public function product()
	{
		$this->render('product');
	}
}
