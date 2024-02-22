<?php

namespace App\Http\Controllers;

use App\Http\Resources\GalleryResource;
use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryController extends Controller
{
    private $resource;
    private $model;

    //  Ao estanciar um objeto é feita a injeção de dependencias da classe UserResource no controller
    public function __construct(Gallery $gallery)
    {
        $this->resource = GalleryResource::class;
        $this->model = $gallery;
    }

    public function index(){
        $gallery = $this->model->all();

        return $this->resource::collection($gallery);
    }


    
    public function show($id): JsonResource {
        $gallery = Gallery::select('galleries.id as gallery_id', 'galleries.name as gallery_name', 'galleries.path as gallery_path', 'galleries.created_at as gallery_created_at', 'users.name as user_name')
                        ->join('users', 'galleries.user_id', '=', 'users.id')
                        ->where('galleries.id', $id)
                        ->first();

        throw_if(!$gallery, new Exception('Algo deu errado'));

        return new GalleryResource($gallery);
    }
    

    public function store(Request $request){
        $dados = $request->all();
        $file = $request->file('image');

        $dados['name'] = $file->getClientOriginalName();

        $image = $this->model->create($dados);
        $customFileName = $image->id . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs('uploads', $customFileName, 'public');

        $image->update(['path' => $filePath]);

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function destroy(){
    }
}
