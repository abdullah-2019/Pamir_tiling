<?php

if (!function_exists('phone_format')) {
    function phone_format($phone) {
        if (empty($phone)) {
            return '';
        }
        
        // Remove all non-numeric characters
        $digits = preg_replace('/[^0-9]/', '', $phone);
        
        // Format based on length (Australian format)
        $length = strlen($digits);
        
        if ($length === 10) {
            // Standard Australian number (e.g., 02 1234 5678)
            return substr($digits, 0, 2) . ' ' . substr($digits, 2, 4) . ' ' . substr($digits, 6);
        } elseif ($length === 9) {
            // Mobile without leading 0 (e.g., 4XX XXX XXX)
            return substr($digits, 0, 3) . ' ' . substr($digits, 3, 3) . ' ' . substr($digits, 6);
        } else {
            // Return as is with spaces every 4 digits if format unknown
            return chunk_split($digits, 4, ' ');
        }
    }
}
