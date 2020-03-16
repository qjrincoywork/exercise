<?php 

defined('__ROOT__') OR exit('No direct script access allowed');
class Users extends Controller
{
    /* public function __construct()
	{
		parent::__construct();
	} */

	public function index()
	{
		// $this->view->allUsers = R::findAll( 'users' );
        // $this->view->title = 'users';
        die('hit');
		$this->view->render('users/index');
	}
}
