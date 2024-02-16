<?php

namespace App\Http\Controllers\language;

use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	public function swap($locale)
	{
		if (!in_array($locale, ['ar', 'en', 'fr', 'de', 'pt'])) {
			abort(400);
		} else {
			session()->put('locale', $locale);
		}

		App::setLocale($locale);
		return redirect()->back();
	}
}
