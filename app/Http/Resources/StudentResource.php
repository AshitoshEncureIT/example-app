<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Validator;
use App\Models\Students;
use App\Http\Resources\StudentResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function index()
    {
        $data = Students::latest()->get();
        return response()->json([StudentResource::collection($data), 'Students fetched.']);
    }
}
