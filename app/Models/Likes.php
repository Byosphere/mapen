<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model {

	protected $table = 'likes';
	
	protected $fillable = ['user_id', 'post_id'];
	
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
}
