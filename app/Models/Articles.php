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
	protected $fillable = ['titre', 'soustitre', 'chapo', 'author', 'contenu', 'like', 'slug'];

}
