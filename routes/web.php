<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isApprover;
use App\Livewire\AdminDashboard;
use App\Livewire\BookingApproval;
use App\Livewire\BookingForm;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', isAdmin::class])->group(function () {
    Volt::route('booking/create', BookingForm::class)->name('booking.create');
    Volt::route('dashboard', AdminDashboard::class)->name('dashboard.admin');
});
Route::middleware(['auth', isApprover::class])->group(function () {
    Volt::route('approval', BookingApproval::class)->name('approval.index');
});

