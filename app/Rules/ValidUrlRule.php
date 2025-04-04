<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class ValidUrlRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if value is a string
        if (!is_string($value)) {
            $fail('The :attribute must be a string.')->translate();
            return;
        }

        // Basic URL validation
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            $fail('The :attribute must be a valid URL.')->translate();
            return;
        }

        // Parse URL components
        $urlParts = parse_url($value);

        // Validate scheme
        $allowedSchemes = ['http', 'https'];
        if (!isset($urlParts['scheme']) || !in_array(strtolower($urlParts['scheme']), $allowedSchemes)) {
            $fail('The :attribute must use HTTP or HTTPS protocol.')->translate();
            return;
        }

        // Validate host
        if (empty($urlParts['host'])) {
            $fail('The :attribute must contain a valid domain.')->translate();
            return;
        }

        // Validate domain format
        if (!$this->isValidDomain($urlParts['host'])) {
            $fail('The :attribute contains an invalid domain format.')->translate();
            return;
        }

        // Optional: Validate IDN domains if intl extension is available
        if (function_exists('idn_to_ascii') && !idn_to_ascii($urlParts['host'])) {
            $fail('The :attribute contains invalid international domain characters.')->translate();
            return;
        }

        // Optional: Validate path format
        if (isset($urlParts['path']) && !preg_match('/^\/[a-zA-Z0-9\-._~!$&\'()*+,;=:@%]*$/', $urlParts['path'])) {
            $fail('The :attribute contains invalid characters in the path.')->translate();
            return;
        }
    }

    /**
     * Validate domain format using regex
     */
    private function isValidDomain(string $domain): bool
    {
        return (bool) preg_match(
            '/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/',
            $domain
        );
    }
}
