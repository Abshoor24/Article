<?php 

namespace App\Models;// untuk mengasih tau bahwa file ini berada di dalam namespace App\Models
// namespace ini digunakan untuk mengorganisir kode dan menghindari konflik nama kela   s
use Illuminate\Support\Arr;

class Post {
    public static function all(){
        return [
            [
                'id' => 1,
                'slug' => 'artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Nosferatu',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem molestiae maxime, necessitatibus et 
                    minima rem ducimus aspernatur, animi, dicta sequi. Enim, 
                    sit commodi. Eius facere illo consequuntur sequi sed.',
            ],
            [
                'id' => 2,
                'slug' => 'artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Nosferatu',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem molestiae maxime, necessitatibus et 
                    minima rem ducimus aspernatur, animi, dicta sequi. Enim, 
                    sit commodi. Eius facere illo consequuntur sequi sed. lol',
            ],
        ];
    }

    public static function find($slug): array 
{
    // cara 1 untuk callback

    // return  Arr::first(static::all(), function ($post) use ($slug) {
    // return $post['slug'] == $slug;
    // });

    // cara 2 untuk callback menggunakan arrow function
    $post = Arr::first(static::all(), fn($post) => $post['slug'] === $slug);

    if (!$post) {
        // jika post tidak ditemukan, kembalikan array kosong
        abort(404, 'Post not found');  

    }
    return $post; 
}
}

