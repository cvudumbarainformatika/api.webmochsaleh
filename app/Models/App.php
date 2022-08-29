<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'section_one' => 'array',
        'section_two' => 'array',
        'themes' => 'array',
    ];

    public function staf()
    {
        return $this->hasMany(Staf::class);
    }
}
