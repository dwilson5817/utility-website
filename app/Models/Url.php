<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;

    /**
     * Instead of using the ID of the URL, we will use the slug to identify it in routes.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Generate a unique, 6 character slug for the short URL.
     *
     * @return string
     */
    public static function generateSlug(): string
    {
        // Create the slug variable to store the slug to
        $slug = null;

        // While the slug is null we loop through this code block
        while ($slug == null) {

            // Get a random 6 digit alphanumeric string
            $slug = Str::random(6);

            // Check if the randomly selected slug is already in use
            if (Url::where('slug', $slug)->get()->isNotEmpty()) {

                // If the slug is in use, we can't use it again so we assign it to null to cause another loop
                $slug = null;
            }
        }

        // We've generated the new slug, so return it
        return $slug;
    }
}
