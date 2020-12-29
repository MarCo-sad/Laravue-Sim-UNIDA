<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use App\Models\Lembaga;
use App\Models\JenisKerjasama;
use App\Models\Benua;
use App\Models\Country;
use App\Models\City;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CooperationsController extends Controller
{
    public function index()
    {
        $cooperations = Cooperation::latest()->get();
        $no = 0;
        return response([
            'success'   => true,
            'message'   => 'List Semua Posts',
            'data'      => $cooperations,
            'no'        => $no
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'name'              => 'required',
                'fakultas_id'       => 'required',
                'lembaga_id'        => 'required',
                'jeniskerjasama_id' => 'required',
                'benua_id'          => 'required',
                'negara_id'         => 'required',
                'kota_id'           => 'required',
                'bidang_id'         => 'required',


            ],
            [
                'name.required'                 => 'Masukkan Nama Mitra !',
                'fakultas_id.required'          => 'Pilih Fakultass!',
                'lembaga_id.required'           => 'Pilih Nama Lembaga !',
                'jeniskerjasama_id.required'    => 'Pilih Jenis Kerjasama!',
                'benua_id.required'             => 'Pilih Benua Asal !',
                'negara_id.required'            => 'Pilih Negara Asal !',
                'kota_id.required'              => 'Pilih Kota Asal !',
                'bidang_id.required'            => 'Pilih Bidang Kerjasama !',
                'tgl_mulai.required'            => 'Pilih Tanggal Mulai Kerjasama !',
                'tgl_berakhir.required'         => 'Pilih Tanggal Berakhir Kerjasama !',
                'documents.required'            => 'Upload Dokumen Anda !'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {
           
            $lembaga = Lembaga::all();
            $jeniskerjasama = JenisKerjasama::all();
            $benua = Benua::all();
            $negara = Country::all();
            $kota = City::all();
            $bidang = Bidang::all();
            $cooperation = Cooperation::create([
                'name'              => $request->input('name'),
                'fakultas_id'       => $request->input('fakultas_id'),
                'lembaga_id'        => $request->input('lembaga_id'),
                'jeniskerjasama_id' => $request->input('jeniskerjasama_id'),
                'benua_id'          => $request->input('benua_id'),
                'negara_id'         => $request->input('negara_id'),
                'kota_id'           => $request->input('kota_id'),
                'bidang_id'         => $request->input('bidang_id'),
                'tgl_mulai'         => $request->input('tgl_mulai'),
                'tgl_berakhir'      => $request->input('tgl_berakhir'),
                'documents'         => $request->input('documents')

            ]);


            if ($cooperation) {
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
        $cooperation = Cooperation::whereId($id)->first();

        if ($cooperation) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Post!',
                'data'    => $cooperation
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
        $validator = Validator::make(
            $request->all(),
            [
                'name'              => 'required',
                'fakultas_id'       => 'required',
                'lembaga_id'        => 'required',
                'jeniskerjasama_id' => 'required',
                'benua_id'          => 'required',
                'negara_id'         => 'required',
                'kota_id'           => 'required',
                'bidang_id'         => 'required',
                'tgl_mulai'         => 'required',
                'tgl_berakhir'      => 'required',
                'documents'         => 'required',
            ],
            [
                'name.required'                 => 'Masukkan Nama Mitra !',
                'fakultas_id.required'          => 'Pilih Fakultass!',
                'lembaga_id.required'           => 'Pilih Nama Lembaga !',
                'jeniskerjasama_id.required'    => 'Pilih Jenis Kerjasama!',
                'benua_id.required'             => 'Pilih Benua Asal !',
                'negara_id.required'            => 'Pilih Negara Asal !',
                'kota_id.required'              => 'Pilih Kota Asal !',
                'bidang_id.required'            => 'Pilih Bidang Kerjasama !',
                'tgl_mulai.required'            => 'Pilih Tanggal Mulai Kerjasama !',
                'tgl_berakhir.required'         => 'Pilih Tanggal Berakhir Kerjasama !',
                'documents.required'            => 'Upload Dokumen Anda !'
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {

            $cooperation = Cooperation::whereId($request->input('id'))->update([
                'name'              => $request->input('name'),
                'fakultas_id'       => $request->input('fakultas_id'),
                'lembaga_id'        => $request->input('lembaga_id'),
                'jeniskerjasama_id' => $request->input('jeniskerjasama_id'),
                'benua_id'          => $request->input('benua_id'),
                'negara_id'         => $request->input('negara_id'),
                'kota_id'           => $request->input('kota_id'),
                'bidang_id'         => $request->input('bidang_id'),
                'tgl_mulai'         => $request->input('tgl_mulai'),
                'tgl_berakhir'      => $request->input('tgl_berakhir'),
                'documents'         => $request->input('documents')

            ]);


            if ($cooperation) {
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
        $cooperation = Cooperation::findOrFail($id);
        $cooperation->delete();

        if ($cooperation) {
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
