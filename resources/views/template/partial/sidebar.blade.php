<div x-data="{ isSidebarOpen: false }">
    <aside 
        class="fixed top-0 left-0 z-40 h-screen w-64 bg-white border-r border-gray-200 transition-transform duration-300 ease-in-out lg:translate-x-0"
        :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="flex flex-col h-full">
            <div class="p-4">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('uksnew.png') }}" alt="Logo" class="w-16 h-16">
                </div>
            </div>

            <nav class="flex-1 p-4">
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('obat.index') }}" 
                           class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('obat.*') ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8 8v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"/>
                                <path d="M4 8m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"/>
                                <path d="M10 14h4"/>
                                <path d="M12 12v4"/>
                            </svg>
                            <span>Obat</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pasien.index') }}" 
                           class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 {{ request()->routeIs('pasien.*') ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
                            </svg>
                            <span>Pasien</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="relative top-4 left-4 z-50 lg:hidden">
        <button 
            @click="isSidebarOpen = !isSidebarOpen"
            class="p-2 rounded-lg bg-white shadow-lg"
            type="button"
        >
            <svg 
                x-show="!isSidebarOpen"
                class="w-6 h-6"
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg 
                x-show="isSidebarOpen"
                class="w-6 h-6"
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div 
        x-show="isSidebarOpen" 
        @click="isSidebarOpen = false" 
        class="fixed inset-0 z-30 bg-gray-900 opacity-50 lg:hidden"
    ></div>
</div>