@extends('template.default')

@php
    $preTitle = 'Daftar Obat';
@endphp

@push('page-actions')
        <a href="{{ route('obat.create') }}">
            <button class="rounded transition ease-in-out delay-50 bg-[#B8001F] hover:bg-[#9E0029] text-sm text-white px-4 py-2 font-medium">Tambah Obat</button>
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
        <!-- Search Form -->
        <form action="{{ route('obat.index') }}" method="GET" class="relative flex items-center space-x-2">
            <input
                type="text"
                id="searchInput"
                name="search"
                class="form-control rounded border border-slate-300 text-black placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300 w-[24rem] h-9 text-sm font-normal"
                placeholder="Cari Obat"
                value="{{ request('search') }}"
                oninput="performSearch(this.value)"
            />
            <button 
                type="button" 
                onclick="openFilterModal()" 
                class="transition ease-in-out delay-50 bg-[#30AF62] hover:bg-[#047A3F] text-white px-4 py-1.5 flex items-center rounded-md text-base"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
            </button>
        </form>
    </div>

    <!-- Filter Modal -->
    <div id="filterModal" class="modal z-50 hidden">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto my-auto">
            <h2 class="text-xl font-semibold mb-4">Filter Obat</h2>
            <form action="{{ route('obat.index') }}" method="GET">
                <div class="mb-4">
                    <label for="kadaluarsa" class="block text-slate-600 text-sm font-medium mb-2">Tanggal Kadaluarsa</label>
                    <input 
                        type="date" 
                        name="kadaluarsa" 
                        id="kadaluarsa" 
                        class="shadow border rounded w-full py-2 px-3 text-slate-600 focus:outline-none focus:ring-4 focus:ring-blue-200 transition duration-300"
                    />
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeFilterModal()" class="transition ease-in-out delay-50 bg-slate-600 text-white px-4 py-2 rounded hover:bg-slate-700">
                        Kembali
                    </button>
                    <button type="submit" class="transition ease-in-out delay-50 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container overflow-x-auto mt-5">
        <table class="w-full border text-sm bg-white rounded-lg shadow">
            <thead>
                    <tr class="bg-gray-100 text-left text-slate-500 font-medium">
                    <th class="px-6 py-3">Nama Obat</th>
                    <th class="px-6 py-3">Kegunaan</th>
                    <th class="px-6 py-3">Stok</th>
                    <th class="px-6 py-3">Tanggal Kadaluarsa</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($obats as $obat)
                    <tr>
                        <td class="px-6 py-4 text-gray-700">{{ $obat->nama_obat }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $obat->kegunaan }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $obat->stok }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $obat->kadaluarsa }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('obat.edit', $obat->id) }}" class="transition ease-in-out delay-50 text-blue-500 hover:text-blue-600">Edit</a>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline">
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

    <div class="mt-4">
        {{ $obats->links('vendor.pagination.custom') }}
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
                fetch(`{{ route('obat.index') }}?search=${searchTerm}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTableBody = doc.querySelector('#obatTableBody');
                    document.querySelector('#obatTableBody').innerHTML = newTableBody.innerHTML;
                });
            }, 100);
        }
    </script>