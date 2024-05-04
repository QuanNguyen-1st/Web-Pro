<?php
require_once('controllers/main/base_controller.php');
require_once('models/feature.php');
require_once('models/product.php');
require_once('models/stock.php');
class LayoutsController extends BaseController
{
	public $activeArr = array('homeActive' => 'active', 'shopActive' => '', 'blogActive' => '', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'layouts';
	}

	public function index()
	{
		$featurepros = [];
		$newpros = [];
		$feature = '';

		$features = Feature::getAll();
		if (count($features) != 0) {
			$feature = $features[rand(0, count($features) - 1)];
			$featurepros = Product::getFeaturePro($feature->id);
		}
		foreach ($featurepros as $pro) {
			$stocks = Stock::getAlt($pro->id);
			$pro->stocks = $stocks;
		}

		$newpros = Product::getNewPro();
		foreach ($newpros as $pro) {
			$stocks = Stock::getAlt($pro->id);
			$pro->stocks = $stocks;
		}

		$data = array('activeArr' => $this->activeArr, 'featurepros' => $featurepros, 'newpros' => $newpros, 'feature' => $feature);
		$this->render('index', $data);
	}
}
