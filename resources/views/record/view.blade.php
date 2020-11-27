@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">{{ __('Просмотр Записи') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="h5">ФИО: <b>{{$record->name}}</b></p>
                    <p class="h5">ИИН: <b>{{$record->iin}}</b></p>
                    <p class="h5">Телефон: <b>{{$record->phone}}</b></p>
                    <p class="h5">Дата начала действия полиса: <b>{{$record->start_date}}</b></p>
                    <p class="h5">Дата окончания действия полиса: <b>{{$record->finish_date}}</b></p>
                    <p class="h5">Гос номер ТС: <b>{{$record->gos_number}}</b></p>
                    
                    @if(sizeof($record->additionalDrivers) > 0)
                        <div class="text-center">
                            <h5><i>Информация о дополнительных водителях</i></h5>
                            <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="p-3 mb-5 rounded text-secondary">
                                    <th class="text-center border-0"><h6>№</h6></th>
                                    <th class="text-center border-0"><h6>ФИО</h6></th>
                                    <th class="text-center border-0"><h6>ИИН</h6></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($record->additionalDrivers as $driver)
                                <tr class="p-3 mb-5 rounded">
                                    <td class="text-center align-middle">{{$loop->iteration}}</td>
                                    <td class="text-center align-middle">{{$driver->name}}</td>
                                    <td class="text-center align-middle">{{$driver->iin}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tablе>
                    </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
