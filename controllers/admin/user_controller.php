<?php
require_once('controllers/admin/base_controller.php');
require_once('models/user.php');
class UserController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'adminActive' => '', 'commentActive' => '', 'userActive' => 'active', 'productActive' => '', 'stockActive' => '', 'featureActive' => '', 'cartActive' => '', 'newsActive' => '', 'couponActive' => '');
	function __construct()
	{
		$this->folder = 'user';
	}

	public function index()
	{
		$user = User::getAll();
		$data = array('user' => $user, 'activeArr' => $this->activeArr);
		$this->render('index', $data);
	}

	public function add()
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		echo $fname . $lname . $birthday . $gender . $phone . $email . $password;
		// Photo
		$target_dir = "public/img/user/";
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
		// Add new
		$add_new = User::insert($email, $target_file, $fname, $lname, $gender, $birthday, $phone, $password);
		header('Location: index.php?page=admin&controller=user&action=index');
	}

	public function editInfo()
	{
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$birthday = $_POST['birthday'];
		$phone = $_POST['phone'];
		$urlcurrent = $_POST['img'];
		// Photo
		$target_dir = "public/img/user/";
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
		$file_pointer = $urlcurrent;
		
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		// Update
		$change_info = User::update($email, $target_file, $fname, $lname, $gender, $birthday, $phone);
		unlink($file_pointer);
		header('Location: index.php?page=admin&controller=user&action=index');
	}

	public function editPass()
	{
		$email = $_POST['email'];
		$newpassword = $_POST['new-password'];
		$change_pass = User::changePassword_($email, $newpassword);
		header('Location: index.php?page=admin&controller=user&action=index');
	}

	public function delete()
	{
		$email = $_POST['email'];
		$urlcurrent = $_POST['img'];
		unlink($urlcurrent);
		$delete_user = User::delete($email);
		header('Location: index.php?page=admin&controller=user&action=index');
	}
}