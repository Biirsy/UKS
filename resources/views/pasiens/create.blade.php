@extends('template.default')

@section('content')
<div class="max-w-2xl mx-auto mt-5 bg-white shadow-md rounded-lg">
    <div class="p-6">
        <form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Pasien</label>
                <input type="text" name="nama" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 @error('nama_pasien') @enderror" placeholder="Masukkan Nama Pasien" value="{{ old('nama_pasien') }}" required>
                @error('nama')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kelas" class="block text-gray-700 font-semibold mb-2">Kelas</label>
                <select name="kelas_id" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300" required>
                    @foreach($kelas as $kel)
                        <option value="{{ $kel->id }}">{{ $kel->kelas }}</option>
                    @endforeach
                </select>
                @error('kelas')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="keluhan" class="block text-gray-700 font-semibold mb-2">Keluhan</label>
                <input type="text" name="keluhan" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 @error('keluhan')  @enderror" placeholder="Masukkan Keluhan" value="{{ old('keluhan') }}" required>
                @error('keluhan')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="obat_id" class="block text-gray-700 font-semibold mb-2">Obat (Jika Perlu)</label>
                <select name="obat_id" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300">
                    <option value="">Tidak Pakai Obat</option>
                    @foreach ($obat as $ob)
                    <option value="{{ $ob->id }}">{{ $ob->nama_obat }} - Stok : {{ $ob->stok }}</option>
                    @endforeach
                </select>
                @error('obat_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="keterangan_id" class="block text-gray-700 font-semibold mb-2">Keterangan</label>
                <select name="keterangan_id" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300"  required>
                    @foreach ($keterangan as $ket)
                    <option value="{{ $ket->id }}">{{ $ket->keterangan }}</option>
                    @endforeach
                </select>
                @error('keterangan_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tanggal_berkunjung" class="block text-gray-700 font-semibold mb-2">Tanggal Berkunjung</label>
                <input type="date" name="tanggal_berkunjung" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300" value="{{ old('tanggal_berkunjung') }}" required>
            </div>
            <div class="flex justify-end gap-4">
                <button type="submit" class="rounded transition ease-in-out delay-50 bg-[#B8001F] hover:bg-[#9E0029] text-sm text-white px-4 py-2 ">
                    Tambah
                </button>
                <button type="button" onclick="window.location='{{ route('pasien.index') }}'" class="rounded transition ease-in-out delay-50 bg-gray-500 text-white px-4 py-2 text-sm text-white  rounded hover:bg-gray-600">
                    Kembali
                </button>
            </div>
        </form>
    </div>
</div>
@endsection