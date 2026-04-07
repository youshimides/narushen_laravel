<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Создать заявление</h2>
                
                <form method="POST" action="{{ route('reports.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Номер автомобиля:</label>
                        <input type="text" name="number" required 
                               class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                               placeholder="А000АА00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Описание нарушения:</label>
                        <textarea name="description" rows="5" required 
                                  class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                  placeholder="Опишите детали нарушения..."></textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-2">
                        <button type="submit" 
                                class="w-full sm:w-auto px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all active:scale-95 text-center cursor-pointer">
                            Создать заявление
                        </button>
                        <a href="{{ route('report.index') }}" 
                           class="w-full sm:w-auto px-8 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 transition-all text-center dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                            Отмена
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>