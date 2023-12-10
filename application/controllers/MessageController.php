<?php

namespace application\controllers;

use PSpell\Config;
use application\models\Main;
use application\models\User;
use application\lib\Pagination;
use application\models\Comment;
use application\models\Message;
use application\core\Controller;

class MessageController extends Controller
{
	public function loginAction()
	{
		if (isset($_SESSION['login'])) {
			$this->view->redirect('message/add');
		}
		if (!empty($_POST)) {
			$user = new User($_POST['login'], $_POST['password']);
			$user->login($_POST['password']);
		}
		$this->view->render('Вход');
	}
	public function registrationAction()
	{
		if (!empty($_POST)) {
			$user = new User($_POST['login'], $_POST['password'], $_POST['email']);
			$user->register();
			$this->view->redirect('login');
		}
		$this->view->render('Регистрация');
	}
	public function addAction()
	{
		$message = new Message;
		$user = new User();
		if(!$user->isLoggedIn()){
			$this->view->redirect('login');
		}
		if (!empty($_POST)) {
			$message->addMessage($_POST['title'], $_SESSION['user_id'], $_POST['Summary'], $_POST['Full_contents']);
			$this->view->message('success', 'Пост добавлен');
		}
		$this->view->render('Добавить пост');
	}

	public function editAction()
	{
		$message = new Message;
		if (!empty($_POST)) {			
			$message->editMessage($this->route['id'],$_POST['title'],$_POST['Summary'],  $_POST['Full_contents'], $_SESSION['user_id']);
			$this->view->redirect('');		
		}
		$vars = [
			'data' => $message->getMessageById($this->route['id'])[0],
		];
		$this->view->render('Редактировать пост', $vars);
	}
	public function editcommentAction()
	{
		$comment = new Comment;
		if (!empty($_POST)) {			
			$comment->updateComment($this->route['id'],$_POST['text_comment']);	
			$this->view->redirect('');		
		}
		$vars = [
			'data' => $comment->getCommentsById($this->route['id'])[0],
		];
		$this->view->render('Редактировать пост', $vars);
	}
	public function deletecommentAction()
	{
		$comment = new Comment;
		$comment->deleteComment($this->route['id']);
		$this->view->redirect('/');
	}

	public function deleteAction()
	{
		$message = new Message;
		if (!$message->isPostExists($this->route['id'])) {
			$this->view->errorCode(404);
		}
		$message->postDelete($this->route['id']);
		$this->view->redirect('');
	}

	public function logoutAction()
	{
		$user = new User();
		$user->logout();
		$this->view->redirect('login');
	}
}
