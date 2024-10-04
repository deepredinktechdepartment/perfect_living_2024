<?php

namespace App\Http\Middleware;

use Closure;

class NoIndex
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // List of route names to prevent from being indexed
        $noIndexRoutes = ['reviews.store', 'review.create']; // Add your route names here

        // Check if the current route is in the no-index list
        if (in_array($request->route()->getName(), $noIndexRoutes)) {
            // Set X-Robots-Tag header to noindex
            $response->headers->set('X-Robots-Tag', 'noindex');
        }

        return $response;
    }
}
