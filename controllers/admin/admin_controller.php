<?php
require_once('controllers/admin/base_controller.php');
class AdminController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => 'active', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '');
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