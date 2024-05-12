<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameRule implements Rule
{

    public function passes($attributes, $value)
    {
        return $value != 'abc';
    }

    public function message()
    {
        return 'Please Enter Gym Name';
    }
}
