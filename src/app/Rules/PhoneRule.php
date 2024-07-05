<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (
            !preg_match("/^\+?\d{1,3}\d{3,4}\d{4}$/", $value) ||
            strlen($value) < 10 ||
            strlen($value) > 20
        ) {
            $fail("The {$attribute} must be a valid phone number between 10 and 20 characters.");
        }
    }
}
