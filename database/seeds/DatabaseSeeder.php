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
			]);

		Articles::create([
			'titre' => 'Un titre',
			'author' => 'Yohann',
			'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-titre',
			'like' => 5
			]);

		Articles::create([
			'titre' => 'Une autre News',
			'author' => 'Yohann',
			'contenu' => 'Lorem ipsum Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Bla balbalbalbal',
			'soustitre' => "Soustitre",
			'slug' => 'une-autre-news',
			'like' => 0
			]);

		Articles::create([
			'titre' => 'Un petit truc',
			'author' => 'Yohann',
			'contenu' => 'Lorem iet, consectetur adipiscing elit. Vivampsum dolor sit aet, consectetur adipiscing elit. Vivamctetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor et, consectetur adipiscing elit. Vivam consectetur adipiscing elit. Vivam euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-petit-truc',
			'like' => 3,
			]);

		Articles::create([
			'titre' => 'Article exemple assez long',
			'author' => 'Yohann',
			'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-titre',
			'like' => 5
			]);

		Articles::create([
			'titre' => 'Un autre',
			'author' => 'Yohann',
			'contenu' => 'Lorem ipsum Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum consectetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Bla balbalbalbal',
			'soustitre' => "Soustitre",
			'slug' => 'une-autre-news',
			'like' => 0
			]);

		Articles::create([
			'titre' => 'Blablalba',
			'author' => 'Yohann',
			'contenu' => 'Lorem iet, consectetur adipiscing elit. Vivampsum dolor sit aet, consectetur adipiscing elit. Vivamctetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor et, consectetur adipiscing elit. Vivam consectetur adipiscing elit. Vivam euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-petit-truc',
			'like' => 3,
			]);

		Articles::create([
			'titre' => 'lqmjdsmqkdmq',
			'author' => 'Yohann',
			'contenu' => 'Lorem iet, consectetur adipiscing elit. Vivampsum dolor sit aet, consectetur adipiscing elit. Vivamctetur adipiscing elit. Vivamus dictum euismod arcu vitae finibus. Curabitur sit amet lacinia ex. Aenean finibus diam et pharetra eleifend. Duis condimentum nunc condimentum dictum mattis. Vestibulum eu nulla dui. Nam euismod leo vel nisi luctus ullamcorper. Pellentesque pellentesque luctus nunc, non rhoncus nisl porta et. Duis fringilla sollicitudin diam, sodales semper sem condimentum ac. Donec dignissim dolor quam, nec mollis nisi cursus vulputate. Vivamus at metus a sem scelerisque tristique quis ut sapien. Sed pretium porta justo sed convallis. Aenean feugiat orci sit amet leo condimentum, at elementum ipsum efficitur.',
			'chapo' => 'Lorem ipsum dolor et, consectetur adipiscing elit. Vivam consectetur adipiscing elit. Vivam euismod arcu vitae finibus. Curabitur sit amet lacinia ex.',
			'soustitre' => "Soustitre",
			'slug' => 'un-petit-truc',
			'like' => 3,
			]);
	}

}
