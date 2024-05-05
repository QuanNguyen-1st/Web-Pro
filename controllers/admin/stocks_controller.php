<?php
require_once('controllers/admin/base_controller.php');
require_once('models/stock.php');
require_once('models/product.php');
class StocksController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => 'active', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'stocks';
	}

	public function index()
	{
		$stocks = Stock::getAll();
		$products = Product::getAll();
		$data = array('activeArr' => $this->activeArr, 'products' => $products, 'stocks' => $stocks);
		$this->render('index', $data);
	}

	public function add() {
		$product_id = $_POST['product_id'];
		$size = $_POST['size'];
		$stock_num = $_POST['stock_num'];
		
		$target_dir = "public/img/products/stocks/";
		$path = $_FILES['fileToUpload']['name'];

		$ext = pathinfo($path, PATHINFO_EXTENSION);
		echo $ext;
		$id = (string)date("Y_m_d_h_i_sa");
		$fileuploadname = (string)$id;
		$fileuploadname .= ".";
		$fileuploadname .= $ext;
		$target_file = $target_dir . basename($fileuploadname);
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		}
		$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Allow certain file formats
		if (
			$fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
			&& $fileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$upload_ok = 0;
		}
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
		}
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

		Stock::insert($product_id, $size, $target_file, $stock_num);
		header('Location: index.php?page=admin&controller=stocks&action=index');
	}

	public function edit() {
		$stock_id = $_POST['id'];
		$product_id = $_POST['product_id'];
		$size = $_POST['size'];
		$stock_num = $_POST['stock_num'];

		$target_dir = "public/img/products/stocks/";
		$path = $_FILES['fileToUpload']['name'];

		$ext = pathinfo($path, PATHINFO_EXTENSION);
		echo $ext;
		$id = (string)date("Y_m_d_h_i_sa");
		$fileuploadname = (string)$id;
		$fileuploadname .= ".";
		$fileuploadname .= $ext;
		$target_file = $target_dir . basename($fileuploadname);
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
		}
		$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Allow certain file formats
		if (
			$fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
			&& $fileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$upload_ok = 0;
		}
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
		}
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

		if (isset($_POST['img'])) {
			unlink($_POST['img']);
		}

		Stock::update($stock_id, $product_id, $size, $target_file, $stock_num);

	}

	public function delete() {
		Stock::delete($_POST['id']);
		if (isset($_POST['img'])) {
			unlink($_POST['img']);
		}
		header('Location: index.php?page=admin&controller=stocks&action=index');

	}
}