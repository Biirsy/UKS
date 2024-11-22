<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::query();

    if ($request->kadaluarsa) {
        $query->where('kadaluarsa', '=', $request->kadaluarsa);
    }

    if ($request->search) {
        $query->where('nama_obat', 'like', '%' . $request->search . '%');
    }

    $obats = $query->paginate(7);

    return view('obats.index', compact('obats'));
    }

    public function create()
    {
        return view('obats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kegunaan' => 'required',
            'stok' => 'required|integer',
            'kadaluarsa' => 'required|date',
        ]);

        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obats.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kegunaan' => 'required',
            'stok' => 'required|integer',
            'kadaluarsa' => 'required|date',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}

