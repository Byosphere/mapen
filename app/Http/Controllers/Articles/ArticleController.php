<?php namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Request;
use Session;
use Validator;
use App\User;
use Input;
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

			\App::abort(404);

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


	public function write($id=-1)
	{

		if (Auth::guest()) {

			return redirect('/home');

		} else {
			
			$user = Auth::user();
			
			if($id ==-1){
				
				return view('write')->with(['user'=>$user]);
				
			} else {
				
				$article = Articles::findOrFail($id);
				return view('modify')->with(['article'=>$article, 'user'=>$user]);
			}

		}
	}

	public function create()
	{

		$user = Auth::user();
		$regles = array(
			'titre' => 'required|min:5|max:40',
			'soustitre' => 'required|min:5|max:100',
			'contenu' => 'required|min:200',
			'chapo' => 'required|max:300',
			'couv' => 'required|image'
		);
		$validation = Validator::make(Request::all(), $regles);

		if ($validation->fails()) {
		  return redirect()->back()->withErrors($validation)->withInput();
		} else {
			
			// gestion de la géoloc
			$latLon = explode('_',Request::input('geoloc'));
			if($latLon[0] == ''){
				
				$latLon[0] = $user->latitude;
				$latLon[1] = $user->longitude;

			}
			// gestion de la couv
			$couv = Input::file('couv');
			// checking file is valid.
			if ($couv->isValid()) {
				
				$destinationPath = public_path().'\uploads\couvertures'; // upload path
				$extension = $couv->getClientOriginalExtension(); // getting image extension
				$fileName = uniqid('couv-').'.'.$extension; // renameing image
				$uploadSuccess = $couv->move($destinationPath, $fileName);
				if($uploadSuccess){
					$path = asset('uploads/couvertures').'/'.$fileName;
				}
			}

			$article = Articles::create([
				'titre' => Request::input('titre'),
				'soustitre' => Request::input('soustitre'),
				'contenu' => Request::input('contenu'),
				'slug' => Str::slug(Request::input('titre')),
				'chapo'=> Request::input('chapo'),
				'latitude'=> $latLon[0],
				'longitude'=> $latLon[1],
				'cover' => $path
			]);
			$article->user()->associate($user);
			$article->save();
			Session::flash('message', 'Votre article a bien été publié !');
			return redirect('/articles/'.$user->id.'/mylist');
		}
	}
	
	
	public function modify($id)
	{
		$article = Articles::findOrFail($id);
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
			
			if(Input::file('couv')){
				// gestion de la couv
				$couv = Input::file('couv');
				// checking file is valid.
				if ($couv->isValid()) {
					
					$destinationPath = public_path().'\uploads\couvertures'; // upload path
					$extension = $couv->getClientOriginalExtension(); // getting image extension
					$fileName = uniqid('couv-').'.'.$extension; // renameing image
					$uploadSuccess = $couv->move($destinationPath, $fileName);
					if($uploadSuccess){
						$path = asset('uploads/couvertures').'/'.$fileName;
						$article->cover = $path;
					}
				}
			}
			$article->titre = Request::input('titre');
			$article->soustitre = Request::input('soustitre');
			$article->contenu = Request::input('contenu');
			$article->slug = Str::slug(Request::input('titre'));
			$article->chapo = Request::input('chapo');
			$article->save();
			Session::flash('message', "L'article a bien été modifié !");
			return redirect('/articles/'.$user->id.'/mylist');
		}
	}
	
	public function delete($id, $slug)
	{
		$user = Auth::user();
		try{

			$article = Articles::findOrFail($id);

		}catch(ModelNotFoundException $e){

			App::abort(404);

		}
		if($article->user == $user){
			$couv = public_path()."\\uploads\couvertures\\".preg_replace("#http(.+)couvertures/#i","",$article->cover);
			unlink($couv);
			$article->delete();
			
			Session::flash('message', "L'article a bien été supprimé");
			
			return redirect('/articles/'.$user->id.'/mylist');
		} else {
			
			Session::flash('message', "Vous ne pouvez pas supprimer cet article !");
			return redirect('/articles/'.$user->id.'/mylist');
			
		}
	}

	public function userList($userId=null)
	{
		$user= User::find($userId);
		return view('userListe', array(
				'user' =>$user
			));

	}

}
