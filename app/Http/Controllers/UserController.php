<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    // Registro de usuario
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = auth('api')->login($user);

        return $this->respondWithToken($token, $user);
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        return $this->respondWithToken($token);
    }

    // Logout
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }

    // Refresh token
    public function refresh()
    {
        $token = auth('api')->refresh();
        return $this->respondWithToken($token);
    }

    // Usuario autenticado
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    // Formato de respuesta de token
    protected function respondWithToken($token, $user = null)
    {
        return response()->json([
            'user' => $user ?? auth('api')->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
