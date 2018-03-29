<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * Generate a unique, 6 character slug for the short URL.
     *
     * @return string
     */
    public static function generateSlug()
    {
        // Create the slug variable to store the slug to
        $slug = null;

        // While the slug is null we loop through this code block
        while($slug == null) {

            // Get a random 6 digit alphanumeric string
            $slug = str_random(6);

            // Check if the randomly selected slug is already in use
            if (Url::where('slug', $slug)->get()->isNotEmpty()) {

                // If the slug is in use, we can't use it again so we assign it to null to cause another loop
                $slug = null;
            }
        }

        // We've generated the new slug, so return it
        return $slug;
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return a RedirectResponse to the long URL.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        return redirect()->away($this->full_url);
    }

    /**
     * Get the user that owns the URL.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
