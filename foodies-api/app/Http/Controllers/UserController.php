<?php

namespace App\Http\Controllers;

use App\Http\Contracts\Users\IUsersService;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected IUsersService $service;

    public function __construct(IUsersService $service)
    {
        $this->service = $service;
    }

    /**
     * @throws ValidationException
     */
    public function create(): array
    {
        $this->validate(request(), [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'telefone' => 'required|min:10|max:11',
            'origem_id' => 'required|min:1',
        ]);

        return $this->service->create(request()->all());
    }
}
