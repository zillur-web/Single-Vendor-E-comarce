<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard(){
        if(auth()->user()->roles->first()->name == 'Customer'){
            return redirect()->route('landing');
        }
        else{
            return view('backend.dashboard');
        }
    }
}
