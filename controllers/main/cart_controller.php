<?php
require_once('controllers/main/base_controller.php');

class CartController extends BaseController
{
	function __construct()
	{
		$this->folder = 'cart';
	}

	public function index()
	{
		$this->render('index');
	}
}
