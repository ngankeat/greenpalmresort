<?php

namespace App\Models\FAQs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class FAQsContact extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['title', 'title_kh', 'description', 'email','phone'];

    protected static $logAttributes = ['title', 'title_kh', 'description', 'email','phone'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $dontSubmitEmptyLogs = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('FAQsContact')
            ->logFillable()
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }
}
