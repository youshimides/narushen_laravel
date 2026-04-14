<x-app-layout>
    <main class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <x-filter :sort=$sort :status=$status></x-filter>

        <div class="space-y-6">
            @foreach ($reports as $report)
                <article class="bg-white border p-6 border-gray-200 rounded-lg hover:shadow-lg transition-shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-3">
                        <span class="text-lg font-bold text-gray-800 dark:text-white">
                            № {{ $report->number }}
                        </span>
                        <x-status :type="$report->status->id">
                            {{ $report->status->name }}
                        </x-status>
                    </div>

                    <p class="text-gray-700 mb-6 leading-relaxed dark:text-gray-300 break-words">
                        {{ $report->description }}
                    </p>
                     
                    @isset($report->path_img)
                        <img src="{{ Storage::url($report->path_img) }}" class="contact-block__img" alt="">
                    @endisset

                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center pt-4 border-t border-gray-100 dark:border-gray-700 gap-4">
                        <span class="text-sm text-gray-500 flex items-center">
                            {{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y H:i') }}
                        </span>

                        <div class="flex space-x-4 w-full md:w-auto justify-end">
                            @if($report->status->id == 1) 
                                <a href="{{ route('reports.edit', $report) }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                    Редактировать
                                </a>
                            @endif

                            <form method="POST" action="{{ route('reports.destroy', $report) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition-colors">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-6">
            {{$reports->links()}}
        </div>
    </main>
</x-app-layout>