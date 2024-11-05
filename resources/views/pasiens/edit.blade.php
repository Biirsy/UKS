<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FCFAEE;
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-5">
        <header class="bg-[#B8001F] text-black text-center py-4">
            <h1 class="text-3xl">Edit Pasien</h1>
        </header>

        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded my-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama Pasien</label>
                <input type="text" class="border border-gray-300 p-2 w-full" name="nama" value="{{ old('nama', $pasien->nama) }}" required>
            </div>
            <div class="mb-4">
                <label for="kelas_id" class="block text-gray-700">Kelas</label>
                <select name="kelas_id" class="border border-gray-300 p-2 w-full" required>
                    <option value="">Pilih Kelas</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ $k->id == $pasien->kelas_id ? 'selected' : '' }}>{{ $k->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="keluhan" class="block text-gray-700">Keluhan</label>
                <input type="text" class="border border-gray-300 p-2 w-full" name="keluhan" value="{{ old('keluhan', $pasien->keluhan) }}" required>
            </div>
            <div class="mb-4">
                <label for="obat_id" class="block text-gray-700">Nama Obat</label>
                <select name="obat_id" class="border border-gray-300 p-2 w-full">
                    <option value="">Pilih Obat</option>
                    @foreach($obat as $ob)
                        <option value="{{ $ob->id }}" {{ $ob->id == $pasien->obat_id ? 'selected' : '' }}>{{ $ob->nama_obat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="keterangan_id" class="block text-gray-700">Keterangan</label>
                <select name="keterangan_id" class="border border-gray-300 p-2 w-full" required>
                    <option value="">Pilih Keterangan</option>
                    @foreach($keterangan as $k)
                        <option value="{{ $k->id }}" {{ $k->id == $pasien->keterangan_id ? 'selected' : '' }}>{{ $k->keterangan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal_berkunjung" class="block text-gray-700">Tanggal Berkunjung</label>
                <input type="date" class="border border-gray-300 p-2 w-full" name="tanggal_berkunjung" value="{{  old('tanggal_berkunjung', $pasien->tanggal_berkunjung) }}" required>
            </div>
            <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray">Update</button>
            <a href="{{ route('pasien.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 ml