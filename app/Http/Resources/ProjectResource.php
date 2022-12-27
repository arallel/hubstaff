<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'project_id' => $this->project_id,
            'project_name' => $this->name,
            'budget' => $this->budget,
            'budget_type' => $this->budget_type,
            'budge_based' => $this->budge_based,
            'client_id' => $this->client_id,
        ];
    }
}
