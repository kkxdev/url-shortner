<?php

namespace App\Http\Controllers;

use App\Rules\ValidUrlRule;
use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => ['required', 'url', 'max:2048', new ValidUrlRule]
        ]);

        $url = Url::create([
            'original_url' => $request->original_url
        ]);

        $url->short_url = Url::generateShortUrl($url->id);
        $url->save();

        return redirect('/')->with('short_url', url($url->short_url));
    }

    public function redirect($shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();
        $url->increment('visits');
        return redirect($url->original_url);
    }
}
