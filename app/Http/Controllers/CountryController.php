<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Http\Resources\ModelCollection;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    public function fetchOne(Request $request)
    {
      $id = $request->get('id');
      $model = Country::where('id',$id)->first();
      return response()->json($model);
    }
    public function index(Request $request)
    {
      $results = Country::all();
      return new ModelCollection($results);
    }
}
