<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke()
    {
        $user = [
            'name' => 'John Doe',
            'age' => 8,
            'address' => 'Bende'
        ];
        $serializedUser = serialize($user);
        return response()->json([$user, $serializedUser]);
    }
}
