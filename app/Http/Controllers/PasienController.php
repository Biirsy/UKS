<?php

// app/Http/Controllers/PasienController.php
namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelas;
use App\Models\Obat;
use App\Models\Keterangan;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request) {

        if($request){
        $obats = Obat::where('nama_obat', 'like', '%'.$request->search.'%')->get();
        $pasiens = Pasien::where('nama', 'like', '%'.$request->search.'%')->get();
        }else{
        $obats = Obat::get();
        $pasiens = Pasien::get();
        $keterangans = Keterangan::get();
        $kelas = Kelas::get();
        }

        return view('pasiens.index', compact('pasiens', 'obats'));
    }

    public function create(){
        return view('pasiens.create', [
            'obat' => Obat::get(),
            'keterangan' => Keterangan::get(),
            'kelas' => Kelas::get(),

        ]);
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'nama' => ['required'],
        'kelas_id' => ['required'],
        'keluhan' => ['required'],
        'obat_id' => ['nullable'],
        'keterangan_id' => ['required'],
        'tanggal_berkunjung' => ['required']
    ], [
        'nama.required' => 'Kolom Nama Tidak Boleh Kosong',
        'kelas_id.required' => 'Kolom Kelas Tidak Boleh Kosong',
        'keluhan.required' => 'Kolom Keluhan Tidak Boleh Kosong',
        'keterangan_id.required' => 'Kolom Keterangan Tidak Boleh Kosong',
        'tanggal_berkunjung.required' => 'Kolom Tanggal Tidak Boleh Kosong',
    ]);

    $pasiens = new Pasien();

    $pasiens->nama = $request->nama;
    $pasiens->kelas_id = $request->kelas_id;
    $pasiens->keluhan = $request->keluhan;
    $pasiens->obat_id = $request->obat_id ;
    $pasiens->keterangan_id = $request->keterangan_id;
    $pasiens->tanggal_berkunjung = $request->tanggal_berkunjung;

    $pasiens->save();

    session()->flash('success', 'Data Berhasil Ditambahkan');

    return redirect()->route('pasien.index');
}


    public function show($id)
    {
       //
    }

    public function edit($id)
    {
        $pasiens = Pasien::find($id);

        return view('pasiens.edit', [
            'pasien' => $pasiens, 
            'obat' => Obat::get(),
            'keterangan' => Keterangan::get(),
            'kelas' => Kelas::get(),
        ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'nama' => ['required'],
        'kelas_id' => ['required'],
        'keluhan' => ['required'],
        'obat_id' => ['nullable'],
        'keterangan_id' => ['required'],
        'tanggal_berkunjung' => ['required']
    ], [
        'nama.required' => 'Kolom Nama Tidak Boleh Kosong',
        'kelas_id.required' => 'Kolom Kelas Tidak Boleh Kosong',
        'keluhan.required' => 'Kolom Keluhan Tidak Boleh Kosong',
        'keterangan_id.required' => 'Kolom Keterangan Tidak Boleh Kosong',
        'tanggal_berkunjung.required' => 'Kolom Tanggal Tidak Boleh Kosong',
    ]);
        
        $pasiens = Pasien::find($id);

        $pasiens->nama = $request->nama;
        $pasiens->kelas_id = $request->kelas_id;
        $pasiens->keluhan = $request->keluhan;
        $pasiens->obat_id = $request->obat_id;
        $pasiens->keterangan_id = $request->keterangan_id;
        $pasiens->tanggal_berkunjung = $request->tanggal_berkunjung;

        $pasiens->save();

        session()->flash('info', 'Data Berhasil Diperbarui');

        return redirect()->route('pasien.index');
    }

    public function destroy($id)
    {
        $pasiens = Pasien::find($id);

        $pasiens->delete();

        session()->flash('danger', 'Data Berhasil Dihapus');

        return redirect()->route('pasien.index');
    }
}

