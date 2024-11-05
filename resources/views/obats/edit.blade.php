<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-[#FCFAEE]">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-[#B8001F] mb-4">Edit Obat</h1>

        @if ($errors->any())
            <div class="mt-4 bg-red-200 text-red-800 p-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('obat.update', $obat->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_obat" class="block text-gray-700">Nama Obat:</label>
                <input type="text" id="nama_obat" name="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" required class="mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Masukkan nama obat">
            </div>
            <div class="mb-4">
                <label for="kegunaan" class="block text-gray-700">Kegunaan:</label>
                <input type="text" id="kegunaan" name="kegunaan" value="{{ old('kegunaan', $obat->kegunaan) }}" required class="mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Masukkan kegunaan obat">
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-gray-700">Stok:</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok', $obat->stok) }}" required class="mt-1 block w-full border border-gray-300 rounded p-2" placeholder="Masukkan stok obat">
            </div>
            <div class="mb-4">
                <label for="kadaluarsa" class="block text-gray-700">Kadaluarsa:</label>
                <input type="date" id="kadaluarsa" name="kadaluarsa" value="{{ old('kadaluarsa', $obat->kadaluarsa) }}" required class="mt-1 block w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-[#A7001A]">Update</button>
            </div>
        </form>

        <a href="{{ route('obat.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">Kembali ke Daftar Obat</a>
    </div>
</body>
</html>