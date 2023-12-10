<?php

namespace application\controllers;

use application\lib\Pagination;
use application\models\Comment;
use application\models\Message;
use application\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		$message = new Message();
		$pagination = new Pagination($this->route, $message->getMessageCount());
		$vars = [
			'pagination' => $pagination->get(),
			'list' =>$message->postsList($this->route),
		];
		$this->view->render('Главная страница', $vars);
	}
	
	public function messageAction() {
		$adminModel = new Message;
		$comment = new Comment;
		if (!$adminModel->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			$comment->addComment( $_SESSION['user_id'], $_POST['Comment'], $this->route['id']);
		}
		$vars = [
			'data' => $adminModel->getMessageById($this->route['id'])[0],
			'comments' => $comment->getCommentsByMessageId($this->route['id'])
		];
		$this->view->render('Пост', $vars);
	}
}