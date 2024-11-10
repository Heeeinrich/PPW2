<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $batas = 10;
        $cari = $request->query('kata', ''); // Menangkap query parameter 'kata' untuk pencarian

        // Jika ada pencarian, filter data berdasarkan judul atau penulis
        if ($cari) {
            $data_buku = Buku::where('judul', 'like', "%$cari%")
                            ->orWhere('penulis', 'like', "%$cari%")
                            ->paginate($batas);
        } else {
            $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        }

        // Menghitung jumlah buku dan total harga
        $jumlah_buku = Buku::count();
        $total_harga = Buku::sum('harga');
        $user = Auth::user();

        return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga', 'cari', 'user'));
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
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id); // Menggunakan findOrFail
        return view('buku.update', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $buku = Buku::findOrFail($id);

        $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');

        $buku->update([
            'judul'      => $request->judul,
            'penulis'    => $request->penulis,
            'harga'      => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
            'thumbnail' => $fileName,
            'file_path'  => '/storage'.$filePath
        ]);

        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id); // Menggunakan findOrFail
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Dihapus');
    }
}
