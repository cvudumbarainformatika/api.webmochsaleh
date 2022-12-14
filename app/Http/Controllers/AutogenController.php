<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Kunjungan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AutogenController extends Controller
{

    public function index()
    {
        // $tableName = 'galleries';
        // $data = Schema::getColumnListing($tableName);

        // echo '<br>';
        // echo '====================================== RESOURCE ============================';
        // echo '<br>';
        // foreach ($data as $key) {
        //     echo '\'' . $key . '\' => $this->' . $key . ',<br>';
        // }
        // echo '<br>';
        // echo '====================================== INI UNTUK request->only ============================';
        // echo '<br>';
        // foreach ($data as $key) {
        //     echo '\'' . $key . '\',';
        // }
        // echo '<br>';
        // echo '====================================== INI UNTUK QUASAR ============================';
        // echo '<br>';
        // foreach ($data as $key) {
        //     echo $key . ': "", <br>';
        // }
        // echo '<br>';
        // $data = Gallery::all();
        // return response()->json($data);
        // $url = Storage::url('lottie/4565-heartbeat-medical.json');
        // return $url;
        // echo asset('storage/lottie/4565-heartbeat-medical.json');
        $filename = "4565-heartbeat-medical";
        $path = storage_path() . "/app/public/lottie/${filename}.json";
        $json = json_decode(file_get_contents($path), true);
        return $json;
    }

    public function coba()
    {
        // echo DIRECTORY_SEPARATOR;
        // $upDir = 'uploads' . DIRECTORY_SEPARATOR . Carbon::now()->toDateString() . DIRECTORY_SEPARATOR;
        // Storage::makeDirectory($upDir);
        // echo $upDir;
        // echo url('/')."/storage";
        // $now = date('Y-m-d');
        $now = Carbon::today()->toDateString();
        $kunjungan = Kunjungan::selectRaw('id')->get()->count();
        $view_hr_ini = Kunjungan::whereDate('created_at', '>=', $now)->get()->count();
        $berita = Berita::selectRaw('id')->get()->count();
        $user = User::selectRaw('id')->get()->count();

        return response()->json(
            [
                'kunjungan' => $kunjungan,
                'view_hr_ini' => $view_hr_ini,
                'berita' => $berita,
                'user' => $user,
                'now' => $now
            ]
        );
    }
}
