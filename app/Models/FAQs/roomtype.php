<?php

namespace App\Models\FAQs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
class roomtype extends Model
{
        protected $fillable = ['properties_id', 'amenities_id', 'facilities_id','description_short','description_long','room_name','price','promotion'];

    protected static $logAttributes = ['properties_id', 'amenities_id', 'facilities_id'];
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
