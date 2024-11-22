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
        <div class="page-wrapper">
            <div class="page-header">
                <div class="container mt-[2.5rem] ml-[2rem]">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-xl text-slate-800 font-semibold">
                                {{ $preTitle ?? '' }}
                            </div>
                        </div>
                        <div class="flex items-center mr-[2.5rem]">
                            @stack('page-actions')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body container ml-[2rem] `">
            @yield('content')
            
        </div>
    </div>
</body>
</html>