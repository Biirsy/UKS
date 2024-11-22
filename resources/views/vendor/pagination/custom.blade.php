<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .pagination nav a, .pagination nav span {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 0.25rem;
            font-weight: 500;
            text-decoration: none;
        }
        .pagination nav a:hover {
            background-color: #2c5282;
        }
        .pagination nav span.cursor-not-allowed {
            opacity: 0.6;
        }
    </style>
</head>
<body>
    @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-4">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-1 mx-1 text-gray-500">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 mx-1 bg-[#B8001F] text-white rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 transition ease-in-out delay-50 mx-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </nav>
    @endif
</body>
</html>
