<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Response;
use App\Http\Controllers\Controller;
use App\Models\Likes;
use Request;
use Auth;

class LikeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	 public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function like()
	{

		if(Request::ajax()){
			
			if(Request::has('article_id')) {
				
				$postId = Request::get('article_id');
				$userId = Auth::id();
				
				if(Likes::where("post_id", $postId)->where("user_id", $userId)->count()>0) {
					
					Likes::where("post_id", $postId)->where("user_id", $userId)->delete();
					return Response::json(array("result"=>"1","isLike"=>"0","text"=>"J'ai apprécié cet article"));
					
				} else {
					
					$like = Likes::create([
						
						'user_id' => $userId,
						'post_id' => $postId 
					]);
					
					$like->save();
					return Response::json(array("result"=>"1","isLike"=>"1","text"=>"Je n'aime plus"));
				}
			}
			
		} else {
			
			return redirect('/home');
		}
		
	}

}
