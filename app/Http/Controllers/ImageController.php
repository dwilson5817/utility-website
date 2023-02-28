<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ImageController extends Controller
{
    /**
     * Shorten a new long URL.
     *
     * @param StoreImageRequest $request
     * @return Response
     */
    public function store(StoreImageRequest $request): Response
    {
        $path = $request->file('image')->store('images');

        $url = new Image();
        $url->user_id = Auth::id();
        $url->path = $path;
        $url->save();

        return Inertia::render('ViewImage', [
            'image' => url($path),
        ]);
    }
}
