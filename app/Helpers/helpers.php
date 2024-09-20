<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

if (!function_exists('isEncrypted')) {
    /**
     * Check if a string is encrypted.
     *
     * @param string $value
     * @return bool
     */
    function isEncrypted($value)
    {
        try {
            // Attempt to decrypt; if successful, it's encrypted
            Crypt::decrypt($value);
            return true;
        } catch (DecryptException $e) {
            // If decryption fails, it's not encrypted
            return false;
        }
    }
}

if (!function_exists('extractGoogleMapsId')) {
    /**
     * Extract the unique identifier or query parameters from a Google Maps URL.
     *
     * @param string $url
     * @return string|null Returns the unique path or query params from the URL, or null if invalid.
     */
    function extractGoogleMapsId($url)
    {
        // Parse the URL
        $parsedUrl = parse_url($url);

        // If the URL is invalid, return null
        if (!$parsedUrl || !isset($parsedUrl['host'])) {
            return null;
        }

        // If it's a Google Maps shortened URL, extract the path part (like c5jWtgbABjgTsFBL8)
        if (strpos($parsedUrl['host'], 'maps.app.goo.gl') !== false) {
            // Remove the leading slash
            return ltrim($parsedUrl['path'], '/');
        }

        // If there are query parameters (for full Google Maps URLs)
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            return $queryParams; // Return the query params
        }

        // In case the URL is well-formed but doesn't have what we're looking for
        return null;
    }
}
