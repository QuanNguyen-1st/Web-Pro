<?php
require_once('controllers/admin/base_controller.php');
require_once('models/product.php');
require_once('models/feature.php');
class ProductsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => 'active', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'products';
	}

	public function index()
	{
		$products = Product::getAll();
		$features = Feature::getAll();
		$data = array('activeArr' => $this->activeArr, 'products' => $products, 'features' => $features);
		$this->render('index', $data);
	}

	public function add() {
		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];

		$target_dir = "public/img/products/";
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

		Product::insert($name, $price, $description, $target_file);
		header('Location: index.php?page=admin&controller=products&action=index');

	}

	public function delete() {
		Product::delete($_POST['id']);
		if (isset($_POST['img'])) {
			unlink($_POST['img']);
		}
		header('Location: index.php?page=admin&controller=products&action=index');
	}

	public function edit() {
		$product_id = $_POST['id'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$feature_id = null;

		if (isset($_POST['feature_id'])) {
			$feature_id = $_POST['feature_id'];
		}

		$target_dir = "public/img/products/";
		$path = $_FILES['fileToUpload']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
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

		Product::update($product_id, $name, $price,$description, 5, $target_file, $feature_id);
		
		if (isset($_POST['img'])) {
			unlink($_POST['img']);
		}
		
		header('Location: index.php?page=admin&controller=products&action=index');
	}
}