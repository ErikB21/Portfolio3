<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category', 'type', 'color', 'skill_image', 'url', 'user_id'];

    // Relazione con il modello User
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function projects():BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_skill');
    }
}
