<?php namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Request;
use Session;
use Validator;
use App\User;
use Illuminate\Http\RedirectResponse;
use App\Models\Articles;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

class ArticleController extends Controller {


	protected $articles;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
	}

	public function index($id, $slug)
	{
		$users = User::get();
		try{

			$article = Articles::findOrFail($id);

		}catch(ModelNotFoundException $e){

			App::abort(404);

		}
		return view('article')->with(['article'=> $article, 'users' => $users]);
	}

	public function liste()
	{
		if(Request::ajax()){

			$response = Articles::orderBy('id', 'desc')->paginate(5);
			return response()->json($response);

		}else{

			return redirect('/home');
		}
	}


	public function write()
	{

		if (Auth::guest()) {

			return redirect('/');

		} else {

			return view('write');

		}
	}

	public function create()
	{

		$user = Auth::user();
		$regles = array(
			'titre' => 'required|min:5|max:40',
			'soustitre' => 'required|min:5|max:100',
			'contenu' => 'required|min:200',
			'chapo' => 'required|max:300'
		);

		$validation = Validator::make(Request::all(), $regles);

		if ($validation->fails()) {
		  return redirect()->back()->withErrors($validation)->withInput();
		} else {
			
			$article = Articles::create([
				'titre' => Request::input('titre'),
				'soustitre' => Request::input('soustitre'),
				'author' => $user->name,
				'contenu' => Request::input('contenu'),
				'slug' => Str::slug(Request::input('titre')),
				'chapo'=> Request::input('chapo'),
			]);
			$article->save();
			return redirect('/articles/'.$user->id.'/mylist');
		}
	}

	public function userList($userId=null)
	{
		$user= User::find($userId);
		$userArticles = Articles::get()->where('author', $user->name);
		return view('userListe', array(
				'user' =>$user,
				'articles'=>$userArticles
			));

	}

}
