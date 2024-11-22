<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function submenu()
    {
        return $this->hasMany(Submenu::class); 
    }
}
