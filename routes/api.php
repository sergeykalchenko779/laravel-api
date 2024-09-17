<?php

use Illuminate\Support\Facades\Route;

Route::post('/submission', [\App\Http\Controllers\SubmissionController::class, 'store'])
    ->name('submission.store');
