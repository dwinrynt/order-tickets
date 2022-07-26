<?php

namespace App\Http\Controllers\Api;

use App\Models\Kamar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\KamarResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    public function index()
    {
        //get posts
        $kamars = Kamar::latest()->paginate(5);

        //return collection of posts as a resource
        return new KamarResource(true, 'List Data Kamar', $kamars);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tipe'           => 'required',
            'harga'          => 'required',
            'jumlah_kamar'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $kamar = Kamar::create([
            'tipe'     => $request->tipe,
            'harga'   => $request->harga,
            'jumlah_kamar'   => $request->jumlah_kamar,
        ]);

        //return response
        return new KamarResource(true, 'Data Post Berhasil Ditambahkan!', $kamar);
    }

    public function show(Kamar $kamar)
    {
        return new KamarResource(true, 'Data Post Ditemukan!', $kamar);
    }

    public function update(Request $request, Kamar $kamar)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'tipe'           => 'required',
            'harga'          => 'required',
            'jumlah_kamar'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

       //update post without image
            $kamar->update([
                'tipe'           => $request->tipe,
                'harga'          => $request->harga,
                'jumlah_kamar'   => $request->jumlah_kamar,
            ]);

        //return response
        return new KamarResource(true, 'Data Post Berhasil Diubah!', $kamar);
    }

    public function destroy(Kamar $kamar)
    {
        //delete post
        $kamar->delete();

        //return response
        return new KamarResource(true, 'Data Post Berhasil Dihapus!', null);
    }

}
