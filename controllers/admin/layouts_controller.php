<?php
require_once('controllers/admin/base_controller.php');
class LayoutsController extends BaseController
{
	public $activeArr = array('homeActive' => 'active', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '');
	function __construct()
	{
		$this->folder = 'layouts';
	}

	public function index()
	{
		$this->render('index', $this->activeArr);
	}
}