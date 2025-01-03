<?php

use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('login-TpXeF6tx6aZ8x$^rr3w7', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login-TpXeF6tx6aZ8x$^rr3w7', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/profile', 'ProfileController@edit')-> name('profile');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::put('/update', 'ProfileController@update')->name('update');

        Route::get('/work', [WorkController::class, 'index'])->name('work');
        Route::post('/work/store', [WorkController::class, 'store'])->name('work.store');
        Route::get('/work/create', [WorkController::class, 'create'])->name('work.create');
        Route::get('/work/{work}/edit', [WorkController::class, 'edit'])->name('work.edit');
        Route::patch('/work/{work}', [WorkController::class, 'update'])->name('work.update');
        Route::delete('/work/{work}', [WorkController::class, 'destroy'])->name('work.destroy');

        Route::get('/skill', [SkillController::class, 'index'])->name('skill');
        Route::post('/skill/store', [SkillController::class, 'store'])->name('skill.store');
        Route::get('/skill/create', [SkillController::class, 'create'])->name('skill.create');
        Route::get('/skill/{skill}/edit', [SkillController::class, 'edit'])->name('skill.edit');
        Route::patch('/skill/{skill}', [SkillController::class, 'update'])->name('skill.update');
        Route::delete('/skill/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');

        Route::get('/certification', [CertificationController::class, 'index'])->name('certification');
        Route::post('/certification/store', [CertificationController::class, 'store'])->name('certification.store');
        Route::get('/certification/create', [CertificationController::class, 'create'])->name('certification.create');
        Route::get('/certification/{certification}/edit', [CertificationController::class, 'edit'])->name('certification.edit');
        Route::patch('/certification/{certification}', [CertificationController::class, 'update'])->name('certification.update');
        Route::delete('/certification/{certification}', [CertificationController::class, 'destroy'])->name('certification.destroy');

        Route::get('/project', [ProjectController::class, 'index'])->name('project');
        Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
        Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::patch('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');


        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
        Route::get('/messages/unread-count', [MessageController::class, 'unreadMessagesCount']);
});
Route::post('/send-email', [ContactController::class, 'sendEmail']);

Route::get('/', function () {
    $ipAddress = request()->ip(); // Ottieni l'IP dell'utente

    // Registra la visita se l'IP non ha già visitato oggi
    Visit::registerVisit($ipAddress);

    // Recupera i conteggi delle visite dalla cache, se esistono
    $dailyVisits = Cache::remember('daily_visits', 600, function () {
        return Visit::getDailyVisits();
    });

    $weeklyVisits = Cache::remember('weekly_visits', 600, function () {
        return Visit::getWeeklyVisits();
    });

    $monthlyVisits = Cache::remember('monthly_visits', 600, function () {
        return Visit::getMonthlyVisits();
    });
    return view('guest.home', compact('dailyVisits', 'weeklyVisits', 'monthlyVisits')); // Assicurati che questa vista esista
})->name('guest.home');

Route::get('{any?}', function(){
    return view('guest.home'); // Questa rotta cattura tutte le richieste
})->where('any', '.*');

