<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use App\Models\Ppidsubmenu;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmenuPpidController extends Controller
{
    public function index()
    {
        $data = Ppidsubmenu::where('ppid_id', request('ppid_id'))->latest()
            // ->with(['submenu'])
            //    ->filter(request(['q','status']))
            // ->paginate(request('per_page'));
            ->get();
        return new JsonResponse($data);
    }

    public function web_content()
    {
        $data = Ppidsubmenu::where('slug', request('slug'))
            ->with(['ppid.submenu'])
            ->first();

        //    $clientIP = request()->ip();
        //    $data->berita_views()->firstOrCreate(['ip'=>$clientIP, 'berita_id'=>$data->id],['agent'=> request()->header('User-Agent')]);

        return new JsonResponse($data);
    }

    public function store(Request $request)
    {
        $saved = DB::transaction(function () use ($request) {
            $path = null;
            $old_path = null;
            $data = null;

            if ($request->hasFile('thumbnail')) {
                $request->validate([
                    'thumbnail' => 'required|image|mimes:jpeg,png,jpg'
                ]);
                $path = $request->file('thumbnail')->store('thumbnail', 'public');
            }

            $request->validate([
                'slug' => 'unique:ppidsubmenus,id,' . $request->id
            ]);

            if ($request->has('id')) {
                $data = Ppidsubmenu::find($request->id);

                if ($request->hasFile('thumbnail')) {
                    $old_path = $data->thumbnail;
                    Storage::delete('public/' . $old_path);

                    $data->thumbnail = $path;
                }
            } else {
                $data = new Ppidsubmenu();
                if ($request->hasFile('thumbnail')) {
                    $data->thumbnail = $path;
                }
            }

            $data->slug = $request->slug;
            $data->nama = $request->nama;
            $data->content = $request->content;
            $data->animation = $request->animation;
            $data->ppid_id = $request->ppid_id;

            $saved = $data->save();

            return $saved;
        });
        if (!$saved) {
            return new JsonResponse(['message' => 'Ada Kesalahan'], 500);
        }
        return new JsonResponse(['message' => 'success'], 201);
    }

    public function destroy(Request $request)
    {
        $data = Ppidsubmenu::query()->find($request->id);
        $old_path = $data->thumbnail;
        Storage::delete('public/' . $old_path);
        $deleted = $data->forceDelete();
        $user = $request->user();
        $user->log("Menghapus Data Pelayanan {$data->nama}");

        if (!$deleted) {
            return new JsonResponse(['message' => 'Ada Kesalahan'], 500);
        }
        return new JsonResponse(['message' => 'success terhapus'], 201);
    }
}
