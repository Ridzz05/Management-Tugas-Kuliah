<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\TaskManager;
use App\Livewire\MateriManager;

Route::get('/', Dashboard::class);
Route::get('/tasks', TaskManager::class);
Route::get('/materi', MateriManager::class);
