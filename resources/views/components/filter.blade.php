@props(['sort','status'])
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