<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller{

    private $resource;
    private $model;

    //  Ao estanciar um objeto é feita a injeção de dependencias da classe UserResource no controller
    public function __construct(User $user){
        $this->resource = UserResource::class;
        $this->model = $user;
    }


    public function auth(AuthRequest $request){

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){

            throw ValidationException::withMessages(['email' => ['The provided credential are incorrect']]);
        }

        // $user->tokens()->delete();

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function register(AuthRequest $request){

        $createdUser = $this->model->create($request->all());

        $token = $createdUser->createToken($request->email)->plainTextToken;

        return (new UserResource($createdUser))->additional(['token' => $token]);
    }

    public function logout(Request $request){

        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function me(){

        $user = auth()->user();

        return response()->json([
            'me' => $user
        ]);

    }

}
