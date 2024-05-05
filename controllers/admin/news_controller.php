<?php
require_once('controllers/admin/base_controller.php');
require_once('models/news.php');
class NewsController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => '', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => 'active', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'news';
	}

	public function index()
	{
		$news = News::getAll();
		$data = array('activeArr' => $this->activeArr, 'news' => $news);
		$this->render('index', $data);
	}

	public function add(){
        $description = $_POST['description'];
        $content = $_POST['content'];
        $title = $_POST['title'];

        $target_dir = "public/img/blog/";
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

        News::insert($title, $description, $content, $target_file);
        header('Location: index.php?page=admin&controller=news&action=index');
    }

    public function edit(){
        $blog_id = $_POST['id'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $title = $_POST['title'];

		// Photo
		$target_dir = "public/img/blog/";
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
        News::update($blog_id, $title, $description, $content, $target_file);
		
		if (isset($_POST['img'])) {
			unlink($_POST['img']);
		}

        header('Location: index.php?page=admin&controller=news&action=index');
    }

    public function delete(){
        $id = $_POST['id'];
        News::delete($id);
		if (isset($_POST['img'])) {
			unlink($_POST['img']);
		}
        header('Location: index.php?page=admin&controller=news&action=index');
    }

    public function hide(){
        $id = $_POST['id'];
        News::hide($id);
        header('Location: index.php?page=admin&controller=news&action=index');
    }
}