<?php

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

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    // $post = Post::find($post);

    return view('post', [
        'title' => 'Post by ' . $post->author->name,
        'post' => $post
    ]);
});

Route::get('/authors/{user}', function (User $user) {

    return view('posts', [
        'title' => 'Articles by ' . $user->name,
        'posts' => $user->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact me']);
});
