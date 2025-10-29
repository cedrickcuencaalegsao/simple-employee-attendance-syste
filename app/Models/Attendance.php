<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'uuid',
        'attID',
        'time_in',
        'time_out',
        'date',
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uuid', 'uuid');
    }
}
