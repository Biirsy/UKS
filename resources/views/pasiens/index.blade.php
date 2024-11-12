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
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal.active {
            display: flex;
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

        <div class="mb-4 flex space-x-4 items-center">
            <a href="{{ route('pasien.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pasien</a>
            <button onclick="openFilterModal()" class="bg-green-500 text-white px-4 py-2 rounded flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
            </button>
            <div class="relative flex-1 max-w-xl">
                <input type="text" 
                       id="searchInput"
                       placeholder="Cari nama pasien..." 
                       class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500"
                       oninput="performSearch(this.value)">
                <div class="absolute right-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Filter Modal -->
        <div id="filterModal" class="modal">
            <div class="modal-content bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto my-auto">
                <h2 class="text-xl font-bold mb-4">Filter Pasien</h2>
                <form action="{{ route('pasien.index') }}" method="GET">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="kelas">
                            Kelas
                        </label>
                        <select name="kelas" id="kelas" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                            <option value="">Semua Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal_berkunjung">
                            Tanggal Berkunjung
                        </label>
                        <input type="date" name="tanggal_berkunjung" id="tanggal_berkunjung" 
                               class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="closeFilterModal()" 
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Kembali
                        </button>
                        <button type="submit" 
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="tableContainer">
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
                <tbody id="patientTableBody">
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

            <div class="mt-4">
                {{ $pasiens->links('vendor.pagination.custom') }}
            </div>


        </div>
    </div>

    <script>
        let searchTimeout;

        function openFilterModal() {
            document.getElementById('filterModal').classList.add('active');
        }

        function closeFilterModal() {
            document.getElementById('filterModal').classList.remove('active');
        }

        function performSearch(searchTerm) {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                fetch(`{{ route('pasien.index') }}?search=${searchTerm}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTableBody = doc.querySelector('#patientTableBody');
                    document.querySelector('#patientTableBody').innerHTML = newTableBody.innerHTML;
                });
            }, 100);
        }
    </script>
</body>
</html>