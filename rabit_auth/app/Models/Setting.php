<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = [
        'language',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
