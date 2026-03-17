    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>НАРУШЕНИЙ.NET</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased dark:bg-gray-800">
        <nav class="bg-white shadow-sm border-b border-gray-200 dark:bg-black dark:border-gray-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="">
                        <h1 class="text-xl font-bold text-red-500">НАРУШЕНИЙ.NET</h1>
                    </div>
                    <a href="{{ route('reports.create') }}" 
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Создать заявление
                    </a>
                </div>
            </div>
        </nav>
<x-app-layout>
        <main class="py-10">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div>
                    <span>Сортировка по дате создания:</span><br>
                    <a href="{{ route('report.index', ['sort'=>'desk', 'status'=>$status])}}">сначала новые</a><br>
                    <a href="{{ route('report.index', ['sort'=>'asc', 'status'=>$status])}}">сначала старые</a>
                </div>
                <div><br>
                    <p>Фильтрация по статусу заявки</p>
                    <ul>
                        @foreach ($statuses as $status )
                        <li>
                            <a href="{{route('report.index', ['sort' => $sort, 'status'=>$status->id])}}">
                                {{$status->name}}</a>
                        </li> 
                        @endforeach ($statuses as $status)
                    </ul>
                </div>
                @foreach ($reports as $report)
                    <article class="bg-white border-b mb-6 p-6 border border-gray-200 hover:shadow-lg transition-shadow  dark:bg-gray-600 ">
                        
                        <div class="flex justify-between items-start mb-3">
                            <p>{{$report->status->name}}</p>
                            <span class="text-lg font-bold text-gray-800 dark:text-white">{{ $report->number }}</span>
                        </div>
                        <p class="text-gray-700 mb-4 leading-relaxed dark:text-white">
                            {{ $report->description }}
                        </p>
                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('reports.edit', $report) }}" 
                            class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                Редактировать
                            </a>
                            <form method="POST" action="{{ route('reports.destroy', $report) }}"  class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 font-medium transition-colors">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
                {{$reports->links()}}
            </x-app-layout>
            </div>
        </main>


    </body>
    </html>