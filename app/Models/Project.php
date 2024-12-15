<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_image',
        'name',
        'text',
        'url',
        'url_video'
    ];

    public function skills():BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'project_skill');
    }
}
