<?php

namespace App\Models;// untuk mengasih tau bahwa file ini berada di dalam namespace App\Models
// namespace ini digunakan untuk mengorganisir kode dan menghindari konflik nama kela   s
use Illuminate\Database\Eloquent\Model; // Model adalah kelas dasar untuk semua model Eloquent di Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory; // trait HasFactory digunakan untuk mengaktifkan fitur factory pada model ini
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
     use HasFactory; // trait HasFactory digunakan untuk mengaktifkan fitur factory pada model ini

     protected $fillable = ['title', 'author', 'slug', 'body'];// untuk mengatur atribut yang dapat diisi secara massal

     public function author():BelongsTo // relasi antara Post dan User
     {
         return $this->belongsTo(User::class); // menghubungkan Post dengan User berdasarkan author_id agar terlihat nama authornya
     }

    public function category(): BelongsTo // relasi antara Post dan Category
        {
            return $this->belongsTo(Category::class); // menghubungkan Post dengan Category berdasarkan category_id agar terlihat nama kategorinya
        }
}
