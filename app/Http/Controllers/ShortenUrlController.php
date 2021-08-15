<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Models\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ShortenUrlController extends Controller
{
    /**
     * Handle a visit to the short URL.
     *
     * @param Url $url
     * @return RedirectResponse
     */
    public function handle(Url $url): RedirectResponse
    {
        $url->increment('clicks', 1);

        return Redirect::to($url->full_url);
    }

    /**
     * Shorten a new long URL.
     *
     * @param StoreUrlRequest $request
     * @param null $url
     * @return RedirectResponse
     */
    public function store(StoreUrlRequest $request, $url = null): RedirectResponse
    {
        $full_url = $request->get('full_url');

        // If the user is not logged in, check if any guests have created a short URL to the same destination.  If they
        // are logged in, see if they have already created a short URL to the same destination.
        if (Auth::guest()) {
            $existing = Url::all()
                ->where("user_id", null)
                ->where("full_url", $full_url)
                ->first();
        } else {
            $existing = Auth::user()
                ->urls()
                ->where('full_url', $full_url)
                ->first();
        }

        // If there is no existing URL to that destination, generate a new slug for this URL and save it to the
        // database.  If a URL has been shortened previously, simply return the existing shortened URL.
        if ($existing == null) {

            // Check if an existing URL is being updated.  This functionality is not implemented yet on the frontend, so
            // for now this will always be true.
            if ($url == null) {
                $url = new Url();
            }

            $url->user_id = Auth::id();
            $url->slug = Url::generateSlug();
            $url->full_url = $full_url;

            $url->save();
        } else {
            $url = $existing;
        }

        return back()->with('short_url', url("/u/{$url->slug}"));
    }
}
