<?php

namespace App\Http\Controllers;

use App\Http\Resources\GalleryResource;
use App\Http\Resources\UserResource;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function index()
    {
        // dd('s');
        $gallery = $this->model->all();

        return $this->resource::collection($gallery);
    }

    public function store(Request $request)
    {
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

    public function destroy()
    {
    }
}
