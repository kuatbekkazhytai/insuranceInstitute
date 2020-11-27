@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Список Полисов') }}</div>
                <div>
                    <a href="{{route('record.create')}}">Создать запись</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="p-3 mb-5 rounded text-secondary">
                                    <th class="text-center border-0"><h6>№</h6></th>
                                    <th class="text-left border-0"><h6>ФИО</h6></th>
                                    <th class="text-left border-0"><h6>ИИН</h6></th>
                                    <th class="text-center border-0"><h6>Телефон</h6></th>
                                    <th class="text-center border-0"><h6>Гос Номер ТС</h6></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                <tr class="p-3 mb-5 rounded">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td>{{$record->iin}}</td>
                                    <td>{{$record->gos_number}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </tablе>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
