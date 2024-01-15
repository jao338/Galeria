<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // throw_if(!$user, new Exception('Kaio é guei'));

        return new $this->resource($user);
    }

    //  Obrigatoriamente retorna um jsonresource
    // public function store(UserRequest $request): JsonResource  {
    //     $createdUser = $this->model->create($request->all());

    //     $token = $createdUser->createToken($request->email)->plainTextToken;

    //     return (new UserResource($createdUser))->additional(['token' => $token]);
    //     // return new UserResource($createdUser);

    // }

    //  Obrigatoriamente retorna um jsonresource
    public function update(UserRequest $request): JsonResource  {

        $updateUser = $this->model->update($request->all());

        return $this->resource($updateUser);
    }

}
