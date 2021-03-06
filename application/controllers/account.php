<?php

//application/controllers/account.php
class Account_Controller extends Base_Controller {
	
	public function action_index() {
        //echo "This is the profile page";
    }

    public function action_login() {
        //echo "This is the login form";
        return View::make('form.login');
    }

    public function action_logout() {
        echo "This is the logout action.";
    }

    public function action_welcome($name, $place) {
        return View::make('account.welcome')
            ->with('name', $name)
            ->with('place', $place);
    }
}
