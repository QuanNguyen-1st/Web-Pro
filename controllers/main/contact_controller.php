<?php
require_once('controllers/main/base_controller.php');

class ContactController extends BaseController
{
	function __construct()
	{
		$this->folder = 'contact';
	}

	public function index()
	{
		$this->render('index');
	}
}
