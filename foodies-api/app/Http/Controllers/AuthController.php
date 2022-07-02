<?php

namespace App\Http\Controllers;

use App\Http\Contracts\Auth\IAuthService;
use Illuminate\Validation\ValidationException;
use OpenApi\Annotations as OA;

/**
 *
 */
class AuthController extends Controller
{
    private IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @OA\Post(
     *     path="/api/v1/auth/login",
     *     tags={"Auth"},
     *     summary="Login",
     *     description="Login user",
     *     operationId="login",
     *     @OA\Response(
     *     response=200,
     *     description="Login success",
     *  )
     * )
     * @return array
     * @throws ValidationException
     */
    public function login(): array
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        return $this->authService->login(request()->all());
    }

    /**
     * @OA\Post(
     *     path="/api/v1/auth/register",
     *     tags={"Auth"},
     *     summary="Register",
     *     description="Register user",
     *     operationId="register",
     *     @OA\Response(
     *     response=200,
     *     description="Register login success",
     *     )
     * )
     * @throws ValidationException
     */
    public function remember(): array
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 3 characters'
        ]);

        return $this->authService->remember(request()->all());
    }

    /**
     * @OA\Post()
     * @return array
     */
    public function logout(): array
    {
        return $this->authService->logout();
    }
}
