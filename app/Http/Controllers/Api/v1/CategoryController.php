<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\KategoriBerita;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all('id','nama');
        return new JsonResponse($data);
    }

    public function store(Request $request)
    {
        // EDIT
        if ($request->has('id')) {
            $data = Category::find($request->id);
            $data->nama = $request->nama;
            $saved = $data->save();
            if (!$saved) {
                return new JsonResponse(['message'=>'Ada Kesalahan'], 500);
            }
            return new JsonResponse(['message'=>'success'], 201);

        //  NEW
        } else {
            $saved = Category::updateOrCreate(['nama'=>$request->nama]);
            if (!$saved) {
                return new JsonResponse(['message'=>'Ada Kesalahan'], 500);
            }
            return new JsonResponse(['message'=>'success'], 201);
        }
    }
    public function destroy(Request $request)
    {
        // DELETE

        $data = Category::find($request->id);
        $kat = KategoriBerita::where('category_id', $request->id)->first();
        if (!$kat) {
            $saved = $data->delete();
            if (!$saved) {
                return new JsonResponse(['message'=>'Ada Kesalahan'], 500);
            }
            return new JsonResponse(['message'=>'success, Data telah terhapus'], 200);
        }
        return new JsonResponse(['message'=>'Maaf, data tidak dapat dihapus, sudah ada berita!'], 500);


    }
}
