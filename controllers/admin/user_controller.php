<?php
require_once('controllers/admin/base_controller.php');
class UserController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => 'active', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '');
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