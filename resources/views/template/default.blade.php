<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.partial.head')

    <style>
    .session-message {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .session-message.hide {
        opacity: 0;
        transform: translateY(-10px);
    }
</style>


</head>
<body>
    <div class="flex">
        @include('template.partial.sidebar')
    </div>

    <div class="flex-1 lg:ml-64">
        <!-- Wrapper -->
        <div class="page-wrapper px-5 pt-5 pb-5"> <!-- Padding untuk jarak antar elemen -->
            <!-- Header -->
            <div class="page-header mb-5">
                <div class="container flex flex-col md:flex-row items-start md:items-center justify-between space-y-3 md:space-y-0">
                    <!-- PreTitle -->
                    <div class="text-xl text-slate-800 font-semibold">
                        {{ $preTitle ?? '' }}
                    </div>
                    <!-- Page Actions -->
                    <div class="flex items-center">
                        @stack('page-actions')
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="page-body container">
                <div class="flex flex-col">
                    @if (session('success'))
                        <div id="successMessage" class="session-message bg-green-600 text-white py-2 px-2 rounded w-60 h-12  flex items-center justify-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('info'))
                        <div id="infoMessage" class="session-message bg-blue-600 text-white py-2 px-2 rounded w-60 h-12 flex items-center justify-center">
                            {{ session('info') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div id="dangerMessage" class="session-message bg-red-600 text-white py-2 px-2 rounded w-60 h-12 flex items-center justify-center">
                            {{ session('danger') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const timeoutDuration = 2000;

        const fadeOut = (id) => {
            const element = document.getElementById(id);
            if (element) {
                setTimeout(() => {
                    element.classList.add('hide'); // Add transition class
                    setTimeout(() => {
                        element.remove(); // Remove from DOM after transition
                    }, 500); // Match CSS transition duration
                }, timeoutDuration);
            }
        };

        fadeOut('successMessage');
        fadeOut('infoMessage');
        fadeOut('dangerMessage');
    });
</script>



</html>
