<?php
require_once('controllers/main/base_controller.php');
class BlogController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => '', 'blogActive' => 'active', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'blog';
	}

	public function index()
	{
		$this->render('index', $this->activeArr);
	}
}
