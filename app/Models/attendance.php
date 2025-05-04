<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'user_id',
        'time_in',
        'time_out',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'uuid', 'uuid');
    }
}
