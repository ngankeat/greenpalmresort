<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageActions extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['page_id', 'name', 'name_kh', 'route_name', 'type', 'position', 'icon'];

    public function page()
    {
        return $this->belongsTo(Pages::class);
    }
}
