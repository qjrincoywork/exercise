<?php 

class User extends Model
{
    public function __construct()
	{
		parent::__construct();
	}

	/* public function index()
	{
		$this->view->allUsers = R::findAll( 'users' );
		$this->view->title = 'users';
		$this->view->render('users/view');
	} */
}
