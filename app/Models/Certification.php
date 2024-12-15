<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_certifications',
        'company_certifications',
        'url_certifications',
        'id_certifications',
        'image_certifications',
        'date_relase_certifications', // Assicurati di avere questo campo nel fillable
        'user_id', // Aggiungi anche 'user_id' qui per i dati associati all'utente
    ];

    protected $dates = ['date_relase_certifications'];

    // Relazione con il modello User
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
