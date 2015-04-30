<?php namespace App\Http\Controllers;

use App\Models\Articles;
use App\User;

class HomeController extends Controller {

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
	public function index()
	{
		$articles = Articles::orderBy('id', 'desc')->paginate(6);
		$articles->setPath('home');
		$users = User::get();
		return view('accueil')->with(['articles' => $articles, 'users'=> $users]);
	}

}