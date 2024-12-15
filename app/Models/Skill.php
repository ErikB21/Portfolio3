<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category', 'type', 'skill_image', 'url', 'user_id'];

    // Relazione con il modello User
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
