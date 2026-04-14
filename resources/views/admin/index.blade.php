<x-app-layout>
    <div style="padding: 20px;">
        <h1>Административная панель</h1>

        @foreach($reports as $report)
            <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                        
            <div style="margin-bottom: 8px;">
                    <strong>ФИО автора:</strong> 
                    {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }}
                </div>
                <div style="margin-bottom: 8px;">
                    <strong>Описание:</strong> {{ $report->description }}
                </div>
                @isset($report->path_img)
                        <img src="{{ Storage::url($report->path_img) }}" class="contact-block__img" alt="">
                    @endisset
                <div style="margin-bottom: 8px;">
                    <strong>Номер авто:</strong> {{ $report->number }}
                </div>
                
                <div style="margin-top: 10px;">
                    <strong>Статус</strong>
                    @if($report->status_id == 1)
                    <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                        @method('patch')
                        @csrf
                        <select name="status_id" id="status_id">
                        @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $report->status_id == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                        @endforeach
                        </select>
                    </form>
                @else
                <span style="padding: 5px 10px; background: #eee; border-radius: 4px;">
                    {{ $report->status->name }}
                </span>
                @endif
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>