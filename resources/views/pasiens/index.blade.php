<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien</title>
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
            <h1 class="text-3xl">Daftar Pasien</h1>
        </header>

        @if(session()->has('success'))
            <div class="bg-green-500 text-white p-4 rounded my-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session()->has('danger'))
            <div class="bg-red-500 text-white p-4 rounded my-4">
                {{ session('danger') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('pasien.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pasien</a>
        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-[#B8001F] text-black">
                <tr>
                    <th class="border px-4 py-2">Nama Pasien</th>
                    <th class="border px-4 py-2">Kelas</th>
                    <th class="border px-4 py-2">Keluhan</th>
                    <th class="border px-4 py-2">Nama Obat</th>
                    <th class="border px-4 py-2">Keterangan</th>
                    <th class="border px-4 py-2">Tanggal Berkunjung</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasiens as $pasien)
                    <tr>
                        <td class="border px-4 py-2">{{ $pasien->nama }}</td>
                        <td class="border px-4 py-2">{{ $pasien->kelasName->kelas }}</td>
                        <td class="border px-4 py-2">{{ $pasien->keluhan }}</td>
                        <td class="border px-4 py-2">{{ $pasien->obatName->nama_obat}}</td>
                        <td class="border px-4 py-2">{{ $pasien->keteranganName->keterangan}}</td>
                        <td class="border px-4 py-2">{{ $pasien->tanggal_berkunjung}}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('pasien.edit', $pasien) }}" class="bg-yellow-500 text-black px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-black px-2 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>