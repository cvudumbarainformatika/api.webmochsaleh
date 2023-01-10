<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($search, array $reqs)
    {
        $search->when($reqs['q'] ?? false, function ($search, $query) {
            return $search->where('url', 'LIKE', '%' . $query . '%');
            // ->orWhere('nip', 'LIKE', '%' . $query . '%')
            // ->orWhere('judul', 'LIKE', '%' . $query . '%');
        });

        // $search->when($reqs['status'] ?? false, function ($search, $sta) {
        //     return $search->where(['status' => $sta]);
        // });

        // $search->when($reqs['category'] ?? false, function ($search, $query) {
        //     return $search->whereHas('categories', function ($finder) use ($query) {
        //         if ($query !== 'all') {
        //             $finder->where('url', $query);
        //         }
        //     });
        // });
    }
}
