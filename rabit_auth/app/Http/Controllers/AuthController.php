<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try{
            $credentials = $request->only('email', 'password');

            if (! $token = Auth::attempt($credentials)) {
                return ApiResponse::unauthorized();
            }

            $user = Auth::user();

            $user->token = $token;

            return ApiResponse::success($user);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }

    public function signUp(Request $request){
        try{
            $credentials = $request->validate([
                'email'    => ['required', 'email', 'unique:users,email'],
                'password' => ['required'],
            ]);

            $user = User::create([
                'name' => $credentials['name'] ?? explode('@', $credentials['email'])[0],
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password']),
                'birth' => null,
                'avatar_url' => env('APP_URL') . '/avatars/defaultAvt.jpg',
            ]);

            $user->token = Auth::fromUser($user);

            return ApiResponse::success($user);
        }catch(\Throwable $th){
            return ApiResponse::internalServerError($th);
        }
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
