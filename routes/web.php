<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

// EAGER LOADING 1

Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get(); // tampilkan semua post dengan relasi author, 
    //                                                 //latest() untuk mengurutkan dari yang terbaru

    $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    // $post = Post::find($post);

    return view('post', [
        'title' => 'Post by ' . $post->author->name,
        'post' => $post
    ]);
});

// LAZY EAGER LOADING 1

Route::get('/authors/{user:username}', function (User $user) { //{user:username} cara ke 2 untuk mengubah route binding

    // $posts =  $user->posts->load(['category', 'author']); // mengambil semua post dari user yang bersangkutan dengan relasi category dan author

    return view('posts', [
        'title' => count($user->posts) . '  Articles by ' . $user->name,
        'posts' => $user->posts //$posts
    ]);
});

// LAZY EAGER LOADING 1

Route::get('/categories/{category:slug}', function (Category $category) { //{user:username} cara ke 2 untuk mengubah route binding

    // $posts =  $category->posts->load(['category', 'author']); 

    return view('posts', [
        'title' => '  Articles in: ' . $category->name,
        'posts' => $category->posts // $posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact me']);
});
