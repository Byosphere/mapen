<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model {
	
	protected $table = 'profile_pictures';

	protected $fillable = ['user_id', 'fullPath', 'name'];
	
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
