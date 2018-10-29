<?php

namespace App\Http\Controllers;

use App\Events\userMailSentEvent;
use App\User;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verify($token){

        User::where('acc_token', $token)->firstOrFail()->update(['acc_token' => 1]);


    }
    public function verified(User $user){

        event(new userMailSentEvent($user));
    }
}
