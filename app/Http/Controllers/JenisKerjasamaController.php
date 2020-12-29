<?php

namespace App\Http\Controllers;
use App\Models\JenisKerjasama;
use App\Http\Resources\ModelCollection;
use Illuminate\Http\Request;

class JenisKerjasamaController extends Controller
{
    public function fetchOne(Request $request)
    {
      $id = $request->get('id');
      $model = JenisKerjasama::where('id',$id)->first();
      return response()->json($model);
    }
    public function index(Request $request)
    {
      $results = JenisKerjasama::all();
      return new ModelCollection($results);
    }
}
