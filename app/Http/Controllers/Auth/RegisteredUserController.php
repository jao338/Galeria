<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisteredUserController extends Controller
{

    private $resource;
    private $model;

    //  Ao estanciar um objeto é feita a injeção de dependencias da classe UserResource no controller
    public function __construct(User $user){
        $this->resource = UserResource::class;
        $this->model = $user;
    }

    //  Obrigatoriamente retorna um jsonresource
    public function index(): JsonResource {

        $users = $this->model->all();

        return $this->resource::collection($users);
    }

    //  Obrigatoriamente retorna um jsonresource
    public function show($id): JsonResource {
        $user = $this->model->find($id);

        throw_if(!$user, new Exception('Algo deu errado'));

        return new $this->resource($user);
    }

    //  Obrigatoriamente retorna um jsonresource
    public function update(UserRequest $request, $id): JsonResource  {

        $user = $this->model->find($id);

        if (!$user) {
            // Handle not found
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($request->all());

        return new $this->resource($user);
    }

    public function destroy($id) {

        $user = $this->model->find($id);

        $user->tokens()->delete();

        $user->delete();

        return response()->json([
            'message' => 'success'
        ]);

    }

}
