<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Registro de usuario
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Crear token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    // Inicio de sesión
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Verificar credenciales
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        // Crear token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    // Cierre de sesión
    public function logout(Request $request)
    {
        // Revocar el token actual
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ], 200);
    }
}