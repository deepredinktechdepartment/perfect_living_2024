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

    // app/helpers.php

// app/helpers.php
if (!function_exists('formatBeds')) {
    function formatBeds($unitConfigurations)
    {
        // Step 1: Check if the input is valid and contains items
        if (is_null($unitConfigurations) || $unitConfigurations->isEmpty()) {
            return ''; // Return a default message if input is null or empty
        }

        // Step 2: Extract bed values
        $bedValues = $unitConfigurations->pluck('beds')->unique()->sort()->toArray();

        // Step 3: Check if bed values exist
        if (empty($bedValues)) {
            return ''; // Fallback if no bed values are found
        }

        // Step 4: Format each bed value with 'BHK' and return the final output
        $formattedBeds = array_map(function ($bed) {
            return $bed . ' BHK'; // Add 'BHK' after each bed value
        }, $bedValues);

        return implode(', ', $formattedBeds); // Join them with a comma separator
    }
}




// Define the statuses array as a constant
define('STATUSES', [
    'pre_launch' => 'Pre Launch',
    'newly_launch' => 'Newly Launched',
    'under_construction' => 'Under Construction',
    'hand_over_in_progress' => 'Hand Over In Progress',
    'ready_to_move' => 'Ready to Move',
]);

// Function to get project status options for the dropdown
if (!function_exists('projectStatusOptions')) {
    function projectStatusOptions($selectedStatus = null)
    {
        $optionsHtml = '';

        foreach (STATUSES as $value => $label) {
            $selected = (old('project_status', $selectedStatus) == $value) ? 'selected' : '';
            $optionsHtml .= "<option value=\"{$value}\" {$selected}>{$label}</option>";
        }

        return $optionsHtml;
    }
}

// Function to get project status label for display
if (!function_exists('getProjectStatusLabel')) {
    function getProjectStatusLabel($status)
    {
        return STATUSES[$status] ?? 'Unknown Status';
    }
}




}
