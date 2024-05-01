<?php
require_once('controllers/admin/base_controller.php');
class LayoutsController extends BaseController
{
	public $activeArr = array('homeActive' => 'active', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'layouts';
	}

	public function index()
	{
		$this->render('index', $this->activeArr);
	}
}