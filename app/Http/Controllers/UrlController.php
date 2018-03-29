<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUrlRequest;
use App\Url;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Show the form create a short URL.
     *
     * @param int
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm()
    {
        return view('create_url');
    }

    /**
     * Handle the submission of the short URL creation form.
     *
     * @param StoreUrlRequest $request
     * @param URL|null $url
     * @return \Illuminate\Http\Response
     */
    public function submitForm(StoreUrlRequest $request, Url $url = null)
    {
        // Take the protocol and host to get the full URL
        $full_url = $request->get('protocol') . $request->get('host');

        // Check if the user is logged in
        if (Auth::guest()) {

            // If the user is not logged in, check if any guests have created a short URL to the same destination
            $existing = Url::all()->where("user_id", null)->where("full_url", $full_url)->first();
        } else {

            // If they are logged in, see if they have already created a short URL to the same destination
            $existing = Auth::user()->urls->where('full_url', $full_url)->first();
        }

        // Check if there is an existing URL as checked previously
        if ($existing == null) {

            // If there is no existing URL to that destination, check if an existing URL is being updated
            if ($url == null) {

                // If this is a new URL, create a new eloquent object for it
                $url = new Url();
            }

            // Assign the user ID, this may be null which is permitted by the database to mean guest
            $url->user_id = Auth::id();

            // Generate a new slug for this URL, this will be unique
            $url->slug = Url::generateSlug();

            // Assign the full URL to the new short URL
            $url->full_url = $full_url;

            // Save to the database
            $url->save();

        } else {

            // If a URL has been shortened previously, simply return the existing shortened URL
            $url = $existing;
        }

        // Return to the create URL view with the new or existing URL object
        return view('create_url', ['url' => $url]);
    }
}
