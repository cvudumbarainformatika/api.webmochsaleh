<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\AppResource;
use App\Models\App;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class AppController extends Controller
{
    public function header()
    {
        $data = App::find(1);
        return new AppResource($data);
    }

    public function store_logo(Request $request)
    {
        $data = App::find(1);
        $old_path = '';
        // hapus foto lama jika ada
        if (!empty($data)) {
            $old_path = $data->logo;
            if (!empty($old_path)) {
                Storage::delete('public/'.$old_path);
            }

            if ($request->hasFile('logo')) {
                $request->validate([
                    'logo'=>'required|image|mimes:jpeg,png,jpg'
                ]);
                $path = $request->file('logo')->store('images', 'public');
                $data->logo = $path;
                $saved = $data->save();
                if (!$saved) {
                    return new JsonResponse(['message'=>'Data tidak tersimpan'], 500);
                }
                return new JsonResponse(['message'=>'success'], 201);
            }
        }
        return new JsonResponse(['message'=>'Data tidak valid'], 500);
    }

    public function store(Request $request)
    {
        $data = App::find(1);

        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->phone = $request->phone;
        $data->link_fb = $request->link_fb;
        $data->link_instagram = $request->link_instagram;
        $data->link_youtube = $request->link_youtube;
        $saved = $data->save();
        if (!$saved) {
            return new JsonResponse(['message'=>'Data tidak valid'], 500);
        }
        return new JsonResponse(['message'=>'success'], 201);
    }
}
