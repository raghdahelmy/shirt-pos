<?php

use App\Livewire\HomePage;
use App\Livewire\ProductCustomizer;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);

Route::get('/customize/{id?}', ProductCustomizer::class);