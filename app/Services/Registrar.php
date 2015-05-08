<?php namespace App\Services;

use App\User;
use Validator;
use Request;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$latLon = explode('_', $data['geoloc']);
		if($latLon[0] == ''){
			
			$latLon[0] = 0;
			$latLon[1] = 0;

		}
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'latitude' => $latLon[0],
			'longitude' => $latLon[1],
			'status' => 'user'
		]);
	}

}
