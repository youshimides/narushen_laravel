<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head> 
<body class="bg-gray-100 dark:bg-black dark:bg-gray-800">
    <nav class="bg-white shadow-sm border-b border-gray-200 dark:bg-black dark:border-gray-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="">
                    <h1 class="text-xl font-bold text-red-500">НАРУШЕНИЙ.NET</h1>
                </div>
            </div>
        </div>
    </nav>
<x-app-layout>
    <div class="max-w-2xl mx-auto mt-8 p-6 bg-white border-b shadow dark:bg-gray-600 dark:text-white" >
        <h2 class="text-2xl font-bold mb-4">Редактировать заявление</h2>
        <form method="POST" action="{{ route('reports.update', $report) }}">
            @csrf
            @method('put')
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1 dark:text-white">Номер автомобиля:</label>
                <input type="text" name="number" value="{{ $report->number }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            </div> 
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1 dark:text-white">Описание:</label>
                <textarea name="description" rows="4" required
                          class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">{{ $report->description }}</textarea>
            </div>
            <div>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Обновить
                </button>
            </div>
        </form>
        </x-app-layout>
    </div>
</body>
</html>