<?php

namespace Modules\ApiApp\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQsQuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => (int)$this->id,
            'cateId' => $this->cate_id,
            'name' => $this->name,
            'sound' => $this->sound,
            'description' => $this->description,
            'order' => (is_numeric($this->order) > 0) ? (int) $this->order : (int) 0,
            'icon' => $this->icon,
            'numViews' => $this->num_views,
        ];
    }
}
