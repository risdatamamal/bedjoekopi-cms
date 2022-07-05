<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
     public function index()
    {
        if (Auth::user() != null) {
            if (Auth::user()->roles == 'ADMIN') {
                return redirect('/admin');
            } else {
                return redirect('/success');
            }
        } else {
            return redirect('/login');
        }
    }
}
