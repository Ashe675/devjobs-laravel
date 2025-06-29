<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->user() && $request->user()->role === 2) {
            return redirect()->route('vacancies.index');
        }

        return view('home');
    }
}
