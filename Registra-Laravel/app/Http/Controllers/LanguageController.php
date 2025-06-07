<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
   
 public function changeLanguage(Request $request)
{
    $locale = $request->input('locale');
    $availableLocales = ['en', 'ar'];
    if (!in_array($locale, $availableLocales)) {
        $locale = config('app.locale'); 
    }

    session(['locale' => $locale]);

    return redirect()->back();
}

}
