<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'activity_name',
        'activity_date',
        'expected_value',
        'actual_value',
        'description',
        'created_by',
    ];

    public function updates()
    {
        return $this->hasMany(ActivityUpdate::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}