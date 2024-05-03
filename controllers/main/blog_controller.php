<?php
require_once('controllers/main/base_controller.php');
require_once('models/news.php');
require_once('models/comment.php');
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

		$newses = News::getAllShow();

		foreach ($newses as $news)
		{
			$news->comments = Comment::getCommentByNews($news->id);
			foreach ($news->comments as $comment)
			{
				$comment->replies = Comment::getReply(intval($comment->id));
			}
		}

		$totalPages = ceil(count($newses) / $itemsPerPage);
		$startIndex = ($currentPage - 1) * $itemsPerPage;
		$endIndex = $startIndex + $itemsPerPage;

		$newses = array_slice($newses, $startIndex, $endIndex);
		
		$data = array('activeArr' => $this->activeArr, 'newses' => $newses, 'currentPage' => $currentPage, 'totalPages' => $totalPages);
		$this->render('index', $data);
	}

	public function reply()
	{
		$content = $_POST['content'];
		$news_id = $_POST['news_id'];
		$user_id = $_POST['user_id'];
		$parent = $_POST['parent'];

		$req = Comment::reply($content, $news_id, $user_id, $parent);
		echo 'success';
		exit();
	}

	public function comment()
	{
		$content = $_POST['content'];
		$news_id = $_POST['news_id'];
		$user_id = $_POST['user_id'];

		$req = Comment::insert($content, $news_id, $user_id);
		echo 'success';
		exit();
	}
}
