<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'visited_at'];

    // La visita è unica se l'IP dell'utente non è già presente per la stessa data
    public static function registerVisit($ipAddress)
    {
        // Verifica se l'IP ha già visitato il sito nello stesso giorno
        if (!self::whereDate('visited_at', now()->toDateString())->where('ip_address', $ipAddress)->exists()) {
            // Registra la visita
            self::create([
                'ip_address' => $ipAddress,
                'visited_at' => now(),
            ]);
        }
    }

    // Funzione per ottenere le visite giornaliere
    public static function getDailyVisits()
    {
        return self::whereDate('visited_at', now()->toDateString())->count();
    }

    // Funzione per ottenere le visite settimanali
    public static function getWeeklyVisits()
    {
        return self::whereBetween('visited_at', [
            now()->startOfWeek(),
            now()->endOfWeek(),
        ])->count();
    }

    // Funzione per ottenere le visite mensili
    public static function getMonthlyVisits()
    {
        return self::whereMonth('visited_at', now()->month)->count();
    }
}
