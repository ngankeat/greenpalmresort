<?php

namespace App\Models\FAQs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class galleries extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['name', 'images', 'status'];

    protected static $logAttributes = ['name', 'images', 'status'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $dontSubmitEmptyLogs = true;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('galleries')
            ->logFillable()
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
