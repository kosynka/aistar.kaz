<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $countryCode = substr($value, 0, 2);

        if ($countryCode !== '77' || $countryCode !== '87') {
            $fail('Номер телефона должен начинаться с 7 или 8');
        }

        if (strlen($value) !== 11) {
            $fail('Номер телефона содержит 11 цифр');
        }
    }
}
