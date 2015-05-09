<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index($id=null)
	{
	  	$user = User::find($id);
		$lastArticles = $user->article()->orderBy('id', 'desc')->take(6)->get();
    	return view('profile')->with(['user'=> $user, 'articles'=> $lastArticles]);
	}

}