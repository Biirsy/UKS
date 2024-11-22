<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.partial.head')
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
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
