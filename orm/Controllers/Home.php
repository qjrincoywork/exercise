<?php 
defined('__ROOT__') OR exit('No direct script access allowed');

class Home extends Controller
{
	public function index()
	{
		$this->view->title = __SITE_NAME__ . ' - Home';
		/* print_r($this->view->title);
		die('its'); */
		$this->view->render('home');
	}

	public function register()
	{
		die(' hit');
		print_r($_POST);
		/* session_start();
		$_SESSION["username"] = "qjrincoy";
		$_SESSION["name"] = "Quir John"; */
	}
}