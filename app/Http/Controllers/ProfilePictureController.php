<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Input;
use Validator;
use Redirect;
use Session;
use File;
use App\Models\ProfilePicture;

class ProfilePictureController extends Controller {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = Auth::user();
		// getting all of the post data
		$file = array('image' => Input::file('image'));
		// setting up rules
		$rules = array('image' => 'required|image'); //mimes:jpeg,bmp,png and for max size max:10000
		// doing the validation, passing post data, rules and the messages
		$validator = Validator::make($file, $rules);
		
		if ($validator->fails()) {
			
			Session::flash('message', "Le fichier récupéré n'est pas valide");
			return Redirect::to('user/'.$user->id);
		
		} else {
			
			$image = Input::file('image');
			// checking file is valid.
			if ($image->isValid()) {
				
				$destinationPath = public_path().'\uploads\profilePictures'; // upload path
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$fileName = uniqid('profile-').'.'.$extension; // renameing image
				$uploadSuccess = $image->move($destinationPath, $fileName);
				if($uploadSuccess){
					
					if(isset($user->profilePicture->id)){
						
						try{
				
							$old = ProfilePicture::findOrFail($user->profilePicture->id);
				
						}catch(ModelNotFoundException $e){
				
							App::abort(404);
				
						}
						File::delete(public_path().'\uploads\profilePictures\\'.$old->name);
						$old->delete();
					}
					$path = asset('uploads/profilePictures').'/'.$fileName;
					$profilePicture = ProfilePicture::create([
						
						'fullPath' => $path,
						'name'  => $fileName
					]);
					$profilePicture->user()->associate($user);
					$profilePicture->save();
					
					Session::flash('message', 'Votre image perso a bien été modifiée !');
					return Redirect::to('user/'.$user->id);
				}
				
			} else {
	
				Session::flash('error', "Le fichier récupéré n'est pas valide");
				return Redirect::to('user/'.$user->id);
			}
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{

			$image = ProfilePicture::findOrFail($id);

		}catch(ModelNotFoundException $e){

			App::abort(404);

		}
		File::delete(public_path().'\uploads\profilePictures'.$image->name);
		
	}

}
