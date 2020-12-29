<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Http\Resources\ModelCollection;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function fetchOne(Request $request)
    {
      $id = $request->get('id');
      $model = City::where('id',$id)->first();
      return response()->json($model);
    }
    public function index(Request $request)
    {
      $results = City::all();
      return new ModelCollection($results);
    }
}
