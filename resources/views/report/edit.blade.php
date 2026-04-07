<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head> 
<body class="bg-gray-100 dark:bg-gray-900">
    <x-app-layout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Редактировать заявление</h2>
                    
                    <form method="POST" action="{{ route('reports.update', $report) }}" class="space-y-5">
                        @csrf
                        @method('put')
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Номер автомобиля:</label>
                            <input type="text" name="number" value="{{ $report->number }}" required
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div> 

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Описание:</label>
                            <textarea name="description" rows="5" required
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ $report->description }}</textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="submit" 
                                    class="w-full sm:w-auto bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 active:transform active:scale-95 transition-all text-center">
                                Обновить
                            </button>
                            <a href="{{ route('report.index') }}" 
                               class="w-full sm:w-auto bg-gray-200 text-gray-800 px-6 py-2.5 rounded-lg font-semibold hover:bg-gray-300 transition-all text-center dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>