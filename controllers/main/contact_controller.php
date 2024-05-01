<?php
require_once('controllers/main/base_controller.php');
class ContactController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => 'active', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'contact';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}
}
