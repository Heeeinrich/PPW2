<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batas = 10;
        $data_buku = Buku::orderBy('id', 'desc')->get();
        $jumlah_buku = Buku::count();
        $total_harga = Buku::sum('harga');
        // $no = $batas * ($data_buku->currentPage() -1);
        $cari = '';
        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga', 'cari'));
    }

    public function search(Request $request)
    {
        $batas = 10;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")
            ->orWhere('penulis', 'like', "%".$cari."%")
            ->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $jumlah_buku = Buku::count();
        $total_harga = Buku::sum('harga');
        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' =>'required|string',
            'harga' =>'required|numeric',
            'tgl_terbit' =>'required|date'
        ]);

        $buku = new Buku();
        $buku -> judul = $request->judul;
        $buku -> penulis = $request->penulis;
        $buku -> harga = $request->harga;
        $buku -> tgl_terbit = $request->tgl_terbit;
        $buku -> save();

        return redirect('/buku')->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.update', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::find($id);
        $buku -> judul = $request->input('judul');
        $buku -> penulis = $request->input('penulis');
        $buku -> harga = $request->input('harga');
        $buku -> tgl_terbit = $request->input('tgl_terbit');
        $buku -> save();

        return redirect('/buku')->with('success', 'Data Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku -> delete();

        return redirect('/buku')->with('success', 'Data Buku Berhasil Dihapus');
    }
}
