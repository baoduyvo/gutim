<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ServiceIdRule implements Rule
{

    public function passes($attributes, $value)
    {
        return $value != -1;
    }

    public function message()
    {
        return 'Please Enter Service Name';
    }
}
