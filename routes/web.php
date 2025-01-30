<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rota inicial redirecionando para a página de login
Route::get('/', fn() => redirect('/login'));

// Rotas de autenticação
Route::prefix('login')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/', [AuthenticatedSessionController::class, 'store']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rotas de Registro
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Rotas de Recuperação de Senha
if (Route::has('password.request')) {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
}

// Rotas protegidas pelo middleware "auth"
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [QuestionController::class, 'create'])->name('dashboard');

    // Gerenciamento de perguntas
    Route::resource('questions', QuestionController::class)->except(['show']);

    // Perfil do usuário
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Estatísticas
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

    // Notificações
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    // Dispositivos
    Route::prefix('devices')->group(function () {
        Route::get('/create', [DeviceController::class, 'create'])->name('devices.create');
        Route::get('/add', [DeviceController::class, 'create'])->name('add.device');
    });

    // Download do app
    Route::get('/app/download', [AppController::class, 'download'])->name('download.app');

    // Gerenciamento de enquetes e link para compartilhamento
    Route::prefix('questions')->group(function () {
        Route::get('/link', [QuestionController::class, 'link'])->name('questions.link');
    });

    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::patch('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    Route::post('/responses', [QuestionController::class, 'storeSurvey'])->name('responses.store');

});
