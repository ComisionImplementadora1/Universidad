<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CorrelativasRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($fuertes)
    {
        $this->fuertes = (array) $fuertes;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !in_array($value, $this->fuertes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Matching values in correlativas fuertes and correlativas debiles.';
    }
}
