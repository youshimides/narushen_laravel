<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявления</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-800">
    <nav class="bg-white shadow-sm border-b border-gray-200 dark:bg-black ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="">
                    <h1 class="text-xl font-bold text-red-600">НАРУШЕНИЙ.NET</h1>
                </div>
            </div>
        </div>
    </nav>
<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white border-b shadow-md dark:bg-gray-600 dark:text-white">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">Создать заявление</h2>
        
        <form method="POST" action="{{ route('reports.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 dark:text-white">Номер автомобиля:</label>
                <input type="text" name="number" required 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 dark:text-white">Описание:</label>
                <textarea name="description" required 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:blue-500"></textarea>
            </div>
            <div>
                <input type="submit" value="Создать" 
                       class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 cursor-pointer font-medium">
            </div>
        </form>
        </x-app-layout>
    </div>
</body>
</html>