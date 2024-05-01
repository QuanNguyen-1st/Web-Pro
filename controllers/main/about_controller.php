<?php
require_once('controllers/main/base_controller.php');
class AboutController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => 'active', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'about';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}
}
