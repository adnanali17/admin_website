<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Redirect to the login page if the user is not authenticated
            return route('login');
        }

        // Optional: Add additional logic here for different redirect scenarios
        // For example, redirect to a custom page or display a specific message

        return null; // Default behavior for JSON requests
    }
}
