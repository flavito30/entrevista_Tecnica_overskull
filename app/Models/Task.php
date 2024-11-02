<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_completed',
    ];

    // Relación inversa con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
