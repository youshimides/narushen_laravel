
<x-app-layout>
        <main class="py-10">
                <x-filter :sort=$sort :status=$status></x-filter>
                @foreach ($reports as $report)
                    <article class="bg-white border-b mb-6 p-6 border border-gray-200 hover:shadow-lg transition-shadow  dark:bg-gray-600 ">
                        
                        <div class="flex justify-between items-start mb-3">
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
                        <x-status :type="$report->status->id">
                            {{$report->status->name}}
                        </x-status>
                    </article>
                @endforeach
                {{$reports->links()}}
</x-app-layout>
