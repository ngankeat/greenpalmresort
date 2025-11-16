<?php

namespace Modules\ApiApp\app\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => (int)$this->id,
            'name' => $this->name,
            'sound' => $this->sound,
            'order' => (is_numeric($this->order) > 0) ? (int) $this->order : (int) 0,
            'icon' => $this->icon,
        ];
    }
}
