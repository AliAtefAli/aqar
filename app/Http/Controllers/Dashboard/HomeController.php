<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        return view('dashboard.index', compact('users'));
    }

    public function changeLanguage() {
        $lang = app()->getLocale();
        ($lang == 'ar') ? $lang = 'en' : $lang = 'ar';
        app()->setLocale($lang);
        session()->put('lang', $lang);
        return back();
    }
}
