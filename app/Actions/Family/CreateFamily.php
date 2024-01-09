<?php

namespace App\Actions\Family;

use App\Models\Family;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CreateFamily
{
    public function create(User $user, array $input): Family
    {
        Validator::make($input, [
            'name' => 'required|string|max:80',
        ])->validateWithBag('createFamily');

        $family = $user->families()->create($input);

        return $family;
    }
}
