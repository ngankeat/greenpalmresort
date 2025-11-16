<?php

namespace App\Models\FAQs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FAQsModels extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['cate_id', 'name', 'sound', 'description', 'order', 'icon', 'num_views', 'created_by'];

    protected static $logAttributes = ['cate_id', 'name', 'sound', 'description', 'order', 'icon', 'num_views', 'created_by'];
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
