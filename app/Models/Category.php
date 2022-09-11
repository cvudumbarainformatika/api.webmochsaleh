<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function beritas()
    {
        return $this->belongsToMany(Berita::class, 'kategori_berita', 'category_id', 'berita_id');
    }
}
