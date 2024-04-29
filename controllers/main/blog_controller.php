<?php
require_once('controllers/main/base_controller.php');

class BlogController extends BaseController
{
	function __construct()
	{
		$this->folder = 'blog';
	}

	public function index()
	{
		$this->render('index');
	}
}
