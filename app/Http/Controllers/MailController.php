<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class MailController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        Mail::to('cy1102931@gmail.com', 'Kiki')->send(new OrderShipped($request));
 
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', '信件已寄出！');
    }
}