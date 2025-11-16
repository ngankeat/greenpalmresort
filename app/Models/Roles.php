<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Roles extends Model
{
    use SoftDeletes, LogsActivity;

    protected $fillable = ['name', 'name_kh', 'slug', 'description', 'order'];
    protected static $logAttributes = ['name', 'name_kh'];
    protected static $logOnlyDirty = true;
    protected static $logFillable = true;
    protected static $dontSubmitEmptyLogs = true;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Role')
            ->logFillable()
            -> logOnlyDirty()
            -> dontSubmitEmptyLogs();
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function isAdmin() {
        return $this->slug == 'administrator' ? true : false;
    }

    public function rolePermissions()
    {
        return $this->hasMany(RolePermissions::class);
    }
}
