<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug']; // untuk mengatur atribut yang dapat diisi secara massal

    public function posts(): HasMany // relasi antara Category dan Post
    {
        return $this->hasMany(Post::class); // menghubungkan Category dengan Post berdasarkan category_id agar terlihat daftar post dalam kategori ini
    }
}
