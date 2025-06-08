<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $locale = $request->input('locale');
        if (in_array($locale, config('app.available_locales', ['en', 'ar']))) {
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}