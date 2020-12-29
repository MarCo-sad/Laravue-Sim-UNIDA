<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activities::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Posts',
            'data' => $activities
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'kerjasama_id'      => 'required',
            'lembaga_id'        => 'required',
            'descriptions'      => 'required',
            'tgl_mulai'         => 'required',
            'documents'         => 'required'
        

        ],
            [
                'name.required'                 => 'Masukkan Nama Kegiatan !',
                'kerjasama_id.required'         => 'Pilih Nama Mitra Terkait!',
                'lembaga_id.required'           => 'Pilih Nama Lembaga !',
                'descriptions.required'         => 'Tuliskan Deskripsi Kegiatan!',
                'tgl_mulai.required'            => 'Pilih Tanggal Mulai Kerjasama !',
                'documents.required'            => 'Upload Dokumen Anda !'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $activity = Activities::create([
                'name'              => $request->input('name'),
                'kerjasama_id'      => $request->input('kerjasama_id'),
                'lembaga_id'        => $request->input('lembaga_id'),
                'descriptions'      => $request->input('descriptions'),
                'tgl_mulai'         => $request->input('tgl_mulai'),
                'documents'         => $request->input('documents')
                
            ]);


            if ($activity) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 400);
            }
        }
    }


    public function show($id)
    {
        $activity = Activities::whereId($id)->first();

        if ($activity) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Post!',
                'data'    => $activity
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'kerjasama_id'      => 'required',
            'lembaga_id'        => 'required',
            'descriptions'      => 'required',
            'tgl_mulai'         => 'required',
            'documents'         => 'required'
        ],
            [
                'name.required'                 => 'Masukkan Nama Kegiatan !',
                'kerjasama_id.required'         => 'Pilih Nama Mitra Terkait!',
                'lembaga_id.required'           => 'Pilih Nama Lembaga !',
                'descriptions.required'         => 'Tuliskan Deskripsi Kegiatan!',
                'tgl_mulai.required'            => 'Pilih Tanggal Mulai Kerjasama !',
                'documents.required'            => 'Upload Dokumen Anda !'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $activity = Activities::whereId($request->input('id'))->update([
                'name'              => $request->input('name'),
                'kerjasama_id'      => $request->input('kerjasama_id'),
                'lembaga_id'        => $request->input('lembaga_id'),
                'descriptions'      => $request->input('descriptions'),
                'tgl_mulai'         => $request->input('tgl_mulai'),
                'documents'         => $request->input('documents')
                
            ]);


            if ($activity) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Diupdate!',
                ], 500);
            }

        }

    }

    public function destroy($id)
    {
        $activity = Activities::findOrFail($id);
        $activity->delete();

        if ($activity) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Dihapus!',
            ], 500);
        }

    }
}

