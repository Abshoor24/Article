<?php

namespace App\Models;// untuk mengasih tau bahwa file ini berada di dalam namespace App\Models
// namespace ini digunakan untuk mengorganisir kode dan menghindari konflik nama kela   s
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model; // Model adalah kelas dasar untuk semua model Eloquent di Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory; // trait HasFactory digunakan untuk mengaktifkan fitur factory pada model ini
use App\Models\User; // import User model
use App\Models\Category; // import Category model

class Post extends Model
{
     use HasFactory; // trait HasFactory digunakan untuk mengaktifkan fitur factory pada model ini

     protected $fillable = ['title', 'author', 'slug', 'body'];// untuk mengatur atribut yang dapat diisi secara massal

     protected $with = ['author', 'category']; // untuk mengaktifkan eager loading pada relasi author dan category, sehingga tidak perlu memanggilnya secara manual

     public function author():BelongsTo // relasi antara Post dan User
     {
         return $this->belongsTo(User::class); // menghubungkan Post dengan User berdasarkan author_id agar terlihat nama authornya
     }

    public function category(): BelongsTo // relasi antara Post dan Category
        {
            return $this->belongsTo(Category::class); // menghubungkan Post dengan Category berdasarkan category_id agar terlihat nama kategorinya
        }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false, // jika ada filter 'search'
            fn ($query, $search) => $query->where('title', 'like', '%' . $search . '%') // maka lakukan pencarian pada judul post
        );

        $query->when(
            $filters['category'] ?? false, // jika ada filter 'category'
            fn ($query, $category) => $query->whereHas('category', fn ($query) => // maka lakukan pencarian pada kategori post
                $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false, // jika ada filter 'author'
            fn ($query, $author) => $query->whereHas('author', fn ($query) => // maka lakukan pencarian pada author post
                $query->where('username', $author)
            )
        );
    }
}
        
            //isset($filters['search']) ?  cara 1
            //cara 2
        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%');
    

