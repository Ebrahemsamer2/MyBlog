<?php

namespace App\Http\Resources\Posts;

use Illuminate\Http\Resources\Json\JsonResource;

class SinglePostResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'image' => $this->image,
            'body' => $this->body,
            'author' => $this->author->name,
            // 'comments' => $this->comments()->with(['user:id,name'])->latest()->get(),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
