<?php
require_once('controllers/admin/base_controller.php');
require_once('models/feature.php');
class FeaturesController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => 'active', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'features';
	}

	public function index()
	{
		$data = array('activeArr' => $this->activeArr);
		$this->render('index', $data);
	}

	public function add() {
		
	}
}