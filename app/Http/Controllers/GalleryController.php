<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller{

    private $resource;
    private $model;

    //  Ao estanciar um objeto é feita a injeção de dependencias da classe UserResource no controller
    public function __construct(Gallery $gallery){
        $this->resource = UserResource::class;
        $this->model = $gallery;
    }

    public function index(){

        $gallery = $this->model->all();

        return $this->resource::collection($gallery);

    }
}
