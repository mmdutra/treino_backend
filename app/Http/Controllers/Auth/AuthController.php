<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $repository;

    public function __construct
    (
        UserRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user = $this->repository->findUserByEmail($request->input('email'));

        if (!$user) {
            return response()->json([
                'error' => 'Email does not exist.'
            ], 400);
        }

        if ($user->verifyPassword($request->input('password'))) {
            return response()->json([
                'token' => $user->getToken()
            ], 200);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }
}
