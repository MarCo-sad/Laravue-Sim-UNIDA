<?php

namespace App\Http\Controllers;
use App\Models\Bidang;
use App\Http\Resources\ModelCollection;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function fetchOne(Request $request)
    {
      $id = $request->get('id');
      $model = Bidang::where('id',$id)->first();
      return response()->json($model);
    }
    public function index(Request $request)
    {
      $results = Bidang::all();
      return new ModelCollection($results);
    }
}
