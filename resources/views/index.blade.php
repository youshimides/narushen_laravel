<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Заявки</h1>
<a href="{{ route('reports.create') }}">Создать заявку</a>

{{-- Начало списка заявок --}}
<ul>
    @foreach ($reports as $report)
        <li>
            <strong>Авто:</strong> {{ $report->auto_number }} <br>
            <strong>Описание:</strong> {{ $report->description }} <br>
            <strong>Создано:</strong> {{ $report->created_at }}
        </li>
    @endforeach
</ul>
</body>
</html>