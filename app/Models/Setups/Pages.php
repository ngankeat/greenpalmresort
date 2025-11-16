<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Pages extends Model
{
    use SoftDeletes,LogsActivity;

    public $fillable = ['module_id', 'name', 'name_kh', 'slug', 'default_action', 'icon', 'order', 'created_by'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $dontSubmitEmptyLogs = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Pages')
            ->logFillable()
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public function module()
    {
        return $this->belongsTo(Modules::class);
    }
}
