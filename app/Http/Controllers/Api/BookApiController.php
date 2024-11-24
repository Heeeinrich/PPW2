<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookApiController extends Controller
{
    // Menampilkan semua buku
    public function index(){
        $books = Buku::latest()->paginate(5);
        return new BookResource(true, 'List Data Buku', $books);
    }

    // Menampilkan satu buku berdasarkan ID
    public function show($id){
        $book = Buku::find($id);

        if (!$book) {
            return response()->json(['success' => false, 'message' => 'Buku not found'], 404);
        }

        return new BookResource(true, 'Detail Data Buku', $book);
    }

    // Menambah buku baru
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation Error', 'data' => $validator->errors()], 422);
        }

        $book = Buku::create($request->all());

        return new BookResource(true, 'Buku berhasil ditambahkan', $book);
    }

    // Memperbarui data buku
    public function update(Request $request, $id){
        $book = Buku::find($id);

        if (!$book) {
            return response()->json(['success' => false, 'message' => 'Buku not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation Error', 'data' => $validator->errors()], 422);
        }

        $book->update($request->all());

        return new BookResource(true, 'Buku berhasil diubah', $book);
    }

    // Menghapus buku berdasarkan ID
    public function destroy($id){
        $book = Buku::find($id);

        if (!$book) {
            return response()->json(['success' => false, 'message' => 'Buku not found'], 404);
        }

        $book->delete();

        return response()->json(['success' => true, 'message' => 'Buku berhasil dihapus'], 200);
    }
}
