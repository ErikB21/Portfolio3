<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_title',
        'work_company',
        'work_city',
        'work_start',
        'work_end',
        'work_present',
        'is_work',
        'is_study',
        'work_explained',
        'work_logo',
        'user_id'
    ];

    // Relazione con il modello User
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
