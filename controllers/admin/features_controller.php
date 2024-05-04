<?php
require_once('controllers/admin/base_controller.php');
require_once('models/feature.php');
require_once('models/product.php');
class FeaturesController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => 'active', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'features';
	}

	public function index()
	{
		$features = Feature::getAll();
		$data = array('activeArr' => $this->activeArr, 'features' => $features);
		$this->render('index', $data);
	}

	public function add() {
		$title = $_POST['title'];
		Feature::insert($title);
		header('Location: index.php?page=admin&controller=features&action=index');
	}

	public function edit() {
		$id = $_POST['id'];
		$title = $_POST['title'];
		Feature::update($id, $title);
		header('Location: index.php?page=admin&controller=features&action=index');
	}

	public function delete() {
		$id = $_POST['id'];
		Feature::delete($id);
		Product::removeFeature($id);
		header('Location: index.php?page=admin&controller=features&action=index');
	}
}