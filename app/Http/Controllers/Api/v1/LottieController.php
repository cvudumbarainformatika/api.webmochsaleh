<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\LottieResource;
use App\Models\Lottie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LottieController extends Controller
{
    public function index()
    {
        $data = Lottie::latest()->paginate(request('per_page'));
        return LottieResource::collection($data);
    }
    public function upload(Request $request)
    {

        if ($request->hasFile('jsons')) {

            $files = $request->file('jsons');

            if (!empty($files)) {
                // return response()->json($request->all());

                for ($i = 0; $i < count($files); $i++) {
                    $file = $files[$i];
                    $originalname = $file->getClientOriginalName();
                    $data = Lottie::where('url', $originalname)->first();
                    Storage::delete('public/lottie/' . $originalname);
                    $gallery = null;
                    if ($data) {
                        $gallery = $data;
                    } else {
                        $gallery = new Lottie();
                    }
                    $path = $file->storeAs('public/lottie/', $originalname);
                    $gallery->nama = $path;
                    $gallery->url = $originalname;
                    $gallery->save();
                    // Lottie::updateOrCreate(['original'=>$originalname],
                    // ['nama'=> $path]);
                }
                return new JsonResponse(['message' => 'success'], 201);
            }
        }
    }
}
