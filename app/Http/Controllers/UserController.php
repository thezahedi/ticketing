<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return Helper::json(User::all());
    }

    public function show(User $user)
    {
        return Helper::json($user);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],
            'password' => [
                'required',
                'confirmed',
            ],
        ]);

        $user = User::query()->create($request->only('name', 'email', 'password'));

        return Helper::json($user);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($request->only('name', 'email'));

        return Helper::json($user->fresh());
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Helper::json();
    }
}
