<?php

namespace App\Http\Controllers;
use App\Models\Lembaga;
use App\Http\Resources\ModelCollection;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function fetchOne(Request $request)
    {
      $id = $request->get('id');
      $model = Lembaga::where('id',$id)->first();
      return response()->json($model);
    }
    public function index(Request $request)
    {
      $results = Lembaga::all();
      return new ModelCollection($results);
    }
}
