<?php
require_once('controllers/admin/base_controller.php');
class CommentsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => 'active', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '');
	function __construct()
	{
		$this->folder = 'comments';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}
}