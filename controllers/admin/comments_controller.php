<?php
require_once('controllers/admin/base_controller.php');
class CommentsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '');
	function __construct()
	{
		$this->folder = 'layouts';
	}

	public function index()
	{
		$this->render('index', $this->activeArr);
	}
}