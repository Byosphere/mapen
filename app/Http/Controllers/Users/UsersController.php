<?php namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\User;
use Request;
use Validator;
use Session;

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
	
	public function geoloc($id)
	{
		$regles = array(
			'lat' => 'required|numeric',
			'lon' => 'required|numeric',
		);
		
		$validation = Validator::make(Request::all(), $regles);
		
		if ($validation->fails()) {
		  return redirect()->back()->withErrors($validation)->withInput();
		} else {
			
			$user = User::find($id);
			$user->latitude = Request::input('lat');
			$user->longitude = Request::input('lon');
			$user->save();
			Session::flash('message', 'Les informations de géolocalisation ont bien été modifiées !');
			return redirect()->back();
		}

	}

}