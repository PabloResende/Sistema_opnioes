<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 **Redirecionamento para Login**
Route::get('/', fn() => redirect('/login'));

// 📌 **Autenticação**
Route::prefix('login')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/', [AuthenticatedSessionController::class, 'store']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// 📌 **Registro**
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// 📌 **Recuperação de Senha**
if (Route::has('password.request')) {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
}

// 📌 **Rotas protegidas pelo middleware "auth"**
Route::middleware('auth')->group(function () {

    // 🔹 **Dashboard**
    Route::get('/dashboard', [QuestionController::class, 'create'])->name('dashboard');

    // 🔹 **Gerenciamento de Perfil**
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // 🔹 **Gerenciamento de Perguntas**
    Route::resource('questions', QuestionController::class)->except(['show']);

    Route::prefix('questions')->group(function () {
        Route::get('/link', [QuestionController::class, 'link'])->name('questions.link');
    });

    // 🔹 **Gerenciamento de Respostas**
    Route::get('/responses', [ResponseController::class, 'index'])->name('responses.index');
    Route::get('/responses/{id}', [ResponseController::class, 'show'])->name('responses.show');
    Route::post('/responses', [ResponseController::class, 'store'])->name('responses.store');

    // 🔹 **Estatísticas**
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

    // 🔹 **Notificações**
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    // 🔹 **Dispositivos**
    Route::prefix('devices')->group(function () {
        Route::get('/create', [DeviceController::class, 'create'])->name('devices.create');
        Route::get('/add', [DeviceController::class, 'create'])->name('add.device');
    });

    // 🔹 **Download do App**
    Route::get('/app/download', [AppController::class, 'download'])->name('download.app');
});
