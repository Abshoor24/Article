<?php

namespace App\Models;// untuk mengasih tau bahwa file ini berada di dalam namespace App\Models
// namespace ini digunakan untuk mengorganisir kode dan menghindari konflik nama kela   s
use Illuminate\Database\Eloquent\Model; // Model adalah kelas dasar untuk semua model Eloquent di Laravel

class Post extends Model
{
     protected $fillable = ['title', 'author', 'slug', 'body'];// untuk mengatur atribut yang dapat diisi secara massal
}
