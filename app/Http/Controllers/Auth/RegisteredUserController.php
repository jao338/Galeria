<?php

namespace App\Http\Controllers\Auth;

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

    public function __construct(User $user){
        $this->resource = UserResource::class;
        $this->model = $user;
    }

    public function index(): JsonResource {

        $users = $this->model->all();

        return $this->resource::collection($users);
    }

    public function show($id): JsonResource {
        $user = $this->model->find($id);

        throw_if(!$user, new Exception('Joao é guei'));

        return $this->resource($user);
    }

    public function store(UserRequest $request): JsonResource  {

        $createdUser = $this->model->create($request->all());

        return $this->resource($createdUser);
    }


}
