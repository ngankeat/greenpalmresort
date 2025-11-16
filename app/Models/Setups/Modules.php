<?php

namespace App\Models\Setups;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Modules extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['name', 'name_kh', 'slug', 'order', 'icon','is_border_bottom', 'created_by'];
    protected static $logAttributes = ['name', 'name_kh'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $dontSubmitEmptyLogs = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Module')
            ->logFillable()
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
