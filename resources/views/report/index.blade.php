<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.NET</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-bold text-red-500 ">НАРУШЕНИЙ.NET</h1>
                </div>
                
                
            </div>
        </div>
    </nav>

    <main class="py-10">
        <div class="flex justify-between items-center h-16">
                    <a href="{{ route('reports.create') }}" class="w-55 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md text-white text-xl">
                        Создать заявление
                    </a>
                </div>
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        
            {{-- <h2 class="text-2xl font-bold mb-6 text-gray-900">Лента заявлений</h2> --}}

            @foreach ($reports as $report)
                <article class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6 border border-gray-200">
                    <div class="flex justify-between items-start mb-3">
                        <time datetime="{{ $report->created_at->format('Y-m-d') }}" class="text-sm font-medium text-gray-500">
                            {{ $report->created_at->format('d.m.Y') }}
                        </time>
                        <span class="text-lg font-bold text-gray-800">{{ $report->auto_number }}</span>
                    </div>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        {{ $report->description }}
                    </p>
                    <form method="post" action="{{route('reports.destroy', $report->id)}}">
                        @method('delete')
                        @csrf
                        <input type="submit" value="Удалить">
                    </form>

                </article>
            @endforeach


            

        </div>
    </main>

    <footer class="bg-white ">
        
    </footer>

</body>
</html>