<?php

namespace App\Http\Controllers;
use App\Models\Benua;
use App\Http\Resources\ModelCollection;
use Illuminate\Http\Request;

class BenuaController extends Controller
{
    public function fetchOne(Request $request)
    {
      $id = $request->get('id');
      $model = Benua::where('id',$id)->first();
      return response()->json($model);
    }
    public function index(Request $request)
    {
      $results = Benua::all();
      return new ModelCollection($results);
    }
}
