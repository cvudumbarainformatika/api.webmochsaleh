<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'kategori_berita', 'berita_id', 'category_id');
    }
}
