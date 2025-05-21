<?php

use App\Http\Controllers\TransactionController;

Route::get('/transactions', [TransactionController::class, 'index']);
    