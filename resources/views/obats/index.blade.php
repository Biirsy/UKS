<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-[#FCFAEE]">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-black mb-4">Daftar Obat</h1>
        <a href="{{ route('obat.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-[#A7001A]">Tambah Obat</a>

        @if(session('success'))
            <div class="mt-4 bg-green-200 text-green-800 p-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 mt-4">
            <thead>
                <tr class="bg-[#B8001F] text-black">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Nama Obat</th>
                    <th class="py-2 px-4 border">Kegunaan</th>
                    <th class="py-2 px-4 border">Stok</th>
                    <th class="py-2 px-4 border">Kadaluarsa</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($obats as $obat)
                    <tr class="">
                        <td class="py-2 px-4 border">{{ $obat->id }}</td>
                        <td class="py-2 px-4 border">{{ $obat->nama_obat }}</td>
                        <td class="py-2 px-4 border">{{ $obat->kegunaan }}</td>
                        <td class="py-2 px-4 border">{{ $obat->stok }}</td>
                        <td class="py-2 px-4 border">{{ $obat->kadaluarsa }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('obat.edit', $obat->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>