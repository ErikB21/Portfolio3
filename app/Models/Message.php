<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email', 'subject', 'message', 'user_id', 'is_read'];

    // Relazione con il modello User
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
