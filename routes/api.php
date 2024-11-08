<?php

use App\http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::post('/customer-loans', [LoanController::class, 'loans']);
