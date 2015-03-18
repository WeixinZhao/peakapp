<?php

class RegisterController extends BaseController {

	public function showRegister()
	{
		return View::make('register');
	}

	public function doRegister()
	{
		
		$user = new User;       
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->remember_token = str_random(50);
        $user->save();
        
        return Redirect::to('/');
	}

}

