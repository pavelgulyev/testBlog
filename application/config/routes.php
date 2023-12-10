<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],
	'contact' => [
		'controller' => 'main',
		'action' => 'contact',
	],
	'message/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'message',
	],
	// MessageController
	'login' => [
		'controller' => 'message',
		'action' => 'login',
	],
	'registration' => [
		'controller' => 'message',
		'action' => 'registration',
	],
	'logout' => [
		'controller' => 'message',
		'action' => 'logout',
	],
	'message/add' => [
		'controller' => 'message',
		'action' => 'add',
	],
	'message/edit/{id:\d+}' => [
		'controller' => 'message',
		'action' => 'edit',
	],
	'message/edit/comment/{id:\d+}' => [
		'controller' => 'message',
		'action' => 'editcomment',
	],
	'message/delete/comment/{id:\d+}' => [
		'controller' => 'message',
		'action' => 'deletecomment',
	],
	'message/delete/{id:\d+}' => [
		'controller' => 'message',
		'action' => 'delete',
	],
	
	'message/message/{page:\d+}' => [
		'controller' => 'message',
		'action' => 'message',
	],
	'message/messages' => [
		'controller' => 'message',
		'action' => 'messages',
	],
];