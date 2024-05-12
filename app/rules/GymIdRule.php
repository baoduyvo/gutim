<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GymIdRule implements Rule
{

    public function passes($attributes, $value)
    {
        return $value != -1;
    }

    public function message()
    {
        return 'Please Enter Gym Name';
    }
}
