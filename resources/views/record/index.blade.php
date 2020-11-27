@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center h4">
                    {{ __('Список Полисов') }}
                    <a class="btn btn-primary ml-4" href="{{route('record.create')}}">Создать запись</a>
                </div>
                <div>
                    
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
                                    <th class="text-center border-0"><h6>ФИО</h6></th>
                                    <th class="text-center border-0"><h6>ИИН</h6></th>
                                    <th class="text-center border-0"><h6>Телефон</h6></th>
                                    <th class="text-center border-0"><h6>Гос Номер ТС</h6></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                <tr class="p-3 mb-5 rounded">
                                    <td class="text-center align-middle"><a href="{{ route('record.view', ['record' => $record]) }}">{{$record->name}}</a></td>
                                    <td class="text-center align-middle">{{$record->iin}}</td>
                                    <td class="text-center align-middle">{{$record->phone}}</td>
                                    <td class="text-center align-middle">{{$record->gos_number}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tablе>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
            {!! $records->links() !!}
        </div>
</div>
@endsection
