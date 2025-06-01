<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Homepage']);
});

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Nosferatu',
        'title' => 'About me'
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => [
            [   'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Nosferatu',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem molestiae maxime, necessitatibus et 
                    minima rem ducimus aspernatur, animi, dicta sequi. Enim, 
                    sit commodi. Eius facere illo consequuntur sequi sed.',
            ],
            [   
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Nosferatu',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem molestiae maxime, necessitatibus et 
                    minima rem ducimus aspernatur, animi, dicta sequi. Enim, 
                    sit commodi. Eius facere illo consequuntur sequi sed. lol',
            ],
        ]
    ]);
});

Route::get('/posts/{slug}', function ($slug) {
   $posts = [
        'title' => 'Blog',
        'posts' => [
            [   'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Nosferatu',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem molestiae maxime, necessitatibus et 
                    minima rem ducimus aspernatur, animi, dicta sequi. Enim, 
                    sit commodi. Eius facere illo consequuntur sequi sed.',
            ],
            [   
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Nosferatu',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem molestiae maxime, necessitatibus et 
                    minima rem ducimus aspernatur, animi, dicta sequi. Enim, 
                    sit commodi. Eius facere illo consequuntur sequi sed. lol',
            ],
        ]
    ];

    // $post = Arr::first($posts, function ($post) use ($id) {
    //     return $post['id'] == $id;
    // });

    $post = Arr::first($posts['posts'], function ($post) use ($slug) {
    return $post['slug'] == $slug;
});

    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact me']);
});
