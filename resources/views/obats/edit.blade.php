@extends('template.default')

@section('content')
<div class="mt-5 bg-white shadow-md rounded-lg">
    <div class="p-6">
        <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_obat" class="block text-gray-700 font-semibold mb-2">Nama Obat</label>
                <input type="text" name="nama_obat" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 @error('nama_obat') @enderror" placeholder="Masukkan Nama Obat" value="{{ old('nama_obat') ?? $obat->nama_obat }}" required>
                @error('nama_obat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kegunaan" class="block text-gray-700 font-semibold mb-2">Kegunaan</label>
                <input type="text" name="kegunaan" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 @error('kegunaan')  @enderror" placeholder="Masukkan Kegunaan" value="{{ old('kegunaan') ?? $obat->kegunaan }}" required>
                @error('kegunaan')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="stok" class="block text-gray-700 font-semibold mb-2">stok</label>
                <input type="number" name="stok" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 @error('stok')  @enderror" placeholder="Masukkan Stok" value="{{ old('stok') ?? $obat->stok }}" required>
                @error('stok')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kadaluarsa" class="block text-gray-700 font-semibold mb-2">Tanggal Kadaluarsa</label>
                <input type="date" name="kadaluarsa" class="w-full border border-gray-300 rounded p-3 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300" value="{{ old('kadaluarsa') ?? $obat->kadaluarsa }}" required>
            </div>
            <div class="flex justify-end gap-4">
                <button type="submit" class="rounded transition ease-in-out delay-50 bg-[#B8001F] hover:bg-[#9E0029] text-sm text-white px-4 py-2 ">
                    Perbarui
                </button>
                <button type="button" onclick="window.location='{{ route('obat.index') }}'" class="rounded transition ease-in-out delay-50 bg-gray-500 text-white px-4 py-2 text-sm text-white rounded hover:bg-gray-600">
                    Kembali
                </button>
            </div>
        </form>
    </div>
</div>
@endsection