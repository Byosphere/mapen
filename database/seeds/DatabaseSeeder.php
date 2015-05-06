<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articles;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		User::create([
			'email' => 'dreamlike.swarm@gmail.com',
			'name' => 'Yohann',
			'password' =>  \Hash::make('admin'),
			'latitude' => 0,
			'longitude' => 49
			]);

		Articles::create([
			'titre' => 'Un titre',
			'user_id' => 1,
			'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-titre'
			]);

		Articles::create([
			'titre' => 'Une autre News',
			'user_id' => 1,
			'contenu' => 'Lorem ipsum Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Bla balbalbalbal',
			'soustitre' => "Soustitre",
			'slug' => 'une-autre-news'
			]);

		Articles::create([
			'titre' => 'Un petit truc',
			'user_id' => 1,
			'contenu' => 'Lorem iet, consectetur adipiscing elit. Vivampsum dolor sit aet, consectetur adipiscing elit. Vivamctetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor et, consectetur adipiscing elit. Vivam consectetur adipiscing elit. Vivam euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-petit-truc'
			]);

		Articles::create([
			'titre' => 'Article exemple assez long',
			'user_id' => 1,
			'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-titre'
			]);

		Articles::create([
			'titre' => 'Un autre',
			'user_id' => 1,
			'contenu' => 'Lorem ipsum Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Bla balbalbalbal',
			'soustitre' => "Soustitre",
			'slug' => 'une-autre-news'
			]);

		Articles::create([
			'titre' => 'Blablalba',
			'user_id' => 1,
			'contenu' => 'Lorem iet, consectetur adipiscing elit. Vivampsum dolor sit aet, consectetur adipiscing elit. Vivamctetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor et, consectetur adipiscing elit. Vivam consectetur adipiscing elit. Vivam euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-petit-truc'
			]);

		Articles::create([
			'titre' => 'lqmjdsmqkdmq',
			'user_id' => 1,
			'contenu' => 'Lorem iet, consectetur adipiscing elit. Vivampsum dolor sit aet, consectetur adipiscing elit. Vivamctetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor et, consectetur adipiscing elit. Vivam consectetur adipiscing elit. Vivam euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-petit-truc'
			]);
	}

}
