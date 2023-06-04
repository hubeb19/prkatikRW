<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return ['nim'=>$this->nim,
        'nama'=>$this->nama,
        'alamat'=>$this->alamat,
        'jurusan'=>$this->jurusan,
        'kelas'=>$this->kelas,
        'kota'=>$this->kota,
        'umur'=>$this->Umur,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,

    ];

    }
}
