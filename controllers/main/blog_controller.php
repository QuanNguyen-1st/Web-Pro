<?php
require_once('controllers/main/base_controller.php');
// require_once('models/news.php');
// require_once('models/comment.php');
class BlogController extends BaseController
{
	public $activeArr = array('homeActive' => '', 'shopActive' => '', 'blogActive' => 'active', 'aboutActive' => '', 'contactActive' => '', 'cartActive' => '');
	function __construct()
	{
		$this->folder = 'blog';
	}

	public function index()
	{
		$currentPage = isset($_GET['pg']) ? $_GET['pg'] : 1;
        $itemsPerPage = 3;

		$blogs = [];

		$totalPages = ceil(count($blogs) / $itemsPerPage);
		$startIndex = ($currentPage - 1) * $itemsPerPage;
		$endIndex = $startIndex + $itemsPerPage;

		$blogs = array_slice($blogs, $startIndex, $endIndex);
		
		$data = array('activeArr' => $this->activeArr, 'blogs' => $blogs, 'currentPage' => $currentPage, 'totalPages' => $totalPages);
		$this->render('index', $data);
	}
}
