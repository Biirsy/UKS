@extends('template.default')

@php
    $preTitle = 'Daftar Pasien';
@endphp

@push('page-actions')
    <a href="{{ route('pasien.create') }}">
        <button class="rounded transition ease-in-out delay-50 bg-[#B8001F] hover:bg-[#9E0029] text-white px-3 py-2 font-medium text-sm">
            Tambah Pasien
        </button>
    </a>
@endpush
<style>
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

@section('content')
    <div class="mt-3">
        <form action="{{ route('pasien.index') }}" method="GET" class="relative flex items-center space-x-2">
        <input
            type="text"
            id="searchInput"
            class="form-control rounded border border-slate-300 text-black placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 w-[24rem] h-9 text-sm font-normal"
            placeholder="Cari Pasien"
            oninput="performSearch(this.value)"
        />
            <button type="button" onclick="openFilterModal()" class="transition ease-in-out delay-50 bg-[#30AF62] hover:bg-[#047A3F] text-white px-4 py-1.5 rounded flex items-center rounded-md text-base">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filter
            </button>
        </form>
    </div>
    <div id="filterModal" class="modal z-50">
            <div class="modal-content bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto my-auto">
                <h2 class="text-xl font-semibold mb-4">Filter Pasien</h2>
                <form action="{{ route('pasien.index') }}" method="GET">
                    <div class="mb-4">
                        <label class="block text-slate-600 text-sm font-medium mb-2" for="kelas">
                            Kelas
                        </label>
                        <select name="kelas" id="kelas" class="shadow border rounded w-full py-2 px-3 text-slate-600 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300">
                            <option value="">Semua Kelas</option>
                            @foreach($kelas as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-slate-600 text-sm font-medium mb-2" for="tanggal_berkunjung">
                            Tanggal Berkunjung
                        </label>
                        <input type="date" name="tanggal_berkunjung" id="tanggal_berkunjung" 
                               class="shadow border rounded w-full py-2 px-3 text-slate-600 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" onclick="closeFilterModal()" 
                                class="transition ease-in-out delay-50 bg-slate-600 text-white px-4 py-2 rounded hover:bg-slate-700">
                            Kembali
                        </button>
                        <button type="submit" 
                                class="transition ease-in-out delay-50 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-container overflow-x-auto"> <!-- Menambahkan overflow agar tabel responsif -->
    <!-- Tabel -->
    <table class="w-full border text-sm bg-white rounded-lg shadow">
        <thead>
            <tr class="bg-gray-100 text-left text-gray-600 font-semibold">
                <th class="px-6 py-3">Nama Pasien</th>
                <th class="px-6 py-3">Kelas</th>
                <th class="px-6 py-3">Keluhan</th>
                <th class="px-6 py-3">Obat</th>
                <th class="px-6 py-3">Keterangan</th>
                <th class="px-6 py-3">Tanggal Berkunjung</th>
                <th class="px-6 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($pasiens as $pasien)
                <tr>
                    <td class="px-6 py-4">{{ $pasien->nama }}</td>
                    <td class="px-6 py-4">{{ $pasien->kelasName->kelas }}</td>
                    <td class="px-6 py-4">{{ $pasien->keluhan }}</td>
                    <td class="px-6 py-4">
                        {{ $pasien->obatName ? $pasien->obatName->nama_obat : 'Tidak Pakai Obat' }}
                    </td>
                    <td class="px-6 py-4">{{ $pasien->keteranganName->keterangan }}</td>
                    <td class="px-6 py-4">{{ $pasien->tanggal_berkunjung }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="transition ease-in-out delay-50 text-blue-500 hover:text-blue-600">Edit</a>
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="transition ease-in-out delay-50 text-red-500 hover:text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
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