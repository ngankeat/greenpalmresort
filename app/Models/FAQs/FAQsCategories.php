<?php

namespace App\Models\FAQs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FAQsCategories extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['name', 'sound', 'order', 'icon','created_by'];

    protected static $logAttributes = ['name', 'sound', 'icon'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $dontSubmitEmptyLogs = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('FAQsCategories')
            ->logFillable()
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
