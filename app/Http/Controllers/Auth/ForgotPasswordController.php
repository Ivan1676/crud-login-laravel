<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
}

// https://stackoverflow.com/questions/44788861/laravel-trait-illuminate-foundation-auth-authenticatesandregistersusers-not-f