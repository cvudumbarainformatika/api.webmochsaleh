<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppidsubmenu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'ppidsubmenus';

    public function ppid()
    {
        return $this->belongsTo(Ppid::class);
    }
}
