<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class AppResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'logo' => $this->logo,
            'nama' => $this->nama,
            'title' => $this->title,
            'alamat' => $this->alamat,
            'desc' => $this->desc,
            'phone' => $this->phone,
            'link_fb' => $this->link_fb,
            'link_instagram' => $this->link_instagram,
            'link_youtube' => $this->link_youtube,
        ];
    }
}
