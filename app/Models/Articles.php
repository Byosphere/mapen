<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['titre', 'soustitre', 'chapo', 'user_id', 'contenu', 'slug', 'latitude', 'longitude'];
	
	public function like()
	{
		
		return $this->hasMany('App\Models\Likes', 'post_id');
		
	}
	
	public function user()
	{
		
		return $this->belongsTo('App\User', 'user_id');
	}

}
