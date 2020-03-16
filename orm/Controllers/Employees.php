<?php 
defined('__ROOT__') OR exit('No direct script access allowed');

class Employees extends Controller
{
	public function index()
	{
		// $this->view->title = __SITE_NAME__ . ' - Home';
		$this->view->render('home');
	}

	public function login()
	{
		session_start();
		$_SESSION["username"] = "qjrincoy";
		$_SESSION["name"] = "Quir John";
	}
}