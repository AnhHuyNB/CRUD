<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function langChange(Request $request) 
    {
        $locale = $request->input('lang');
        Session::put('locale', $locale);
        
        return redirect()->back();
    }
}
