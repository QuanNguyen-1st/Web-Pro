<?php
require_once('controllers/admin/base_controller.php');
class LayoutsController extends BaseController
{
	public $activeArr = array('homeActive' => 'active', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'layouts';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}
}