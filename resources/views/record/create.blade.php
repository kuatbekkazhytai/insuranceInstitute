@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center h4">{{ __('Создание полисов') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form action="{{ route('record.store')}}" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Номер телефона') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ФИО страховтеля') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="iin" class="col-md-4 col-form-label text-md-right">{{ __('ИИН страховтеля') }}</label>

                                <div class="col-md-6">
                                    <input id="iin" type="text" class="form-control @error('iin') is-invalid @enderror" name="iin" value="{{ old('iin') }}" required autocomplete="iin" autofocus>

                                    @error('iin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="startDate" class="col-md-4 col-form-label text-md-right">{{ __('Дата начала действия полиса') }}</label>

                                <div class="col-md-6">
                                    <input id="startDate" type="date" class="form-control @error('startDate') is-invalid @enderror" name="startDate" value="{{ old('startDate') }}" required autofocus>

                                    @error('startDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="finishDate" class="col-md-4 col-form-label text-md-right">{{ __('Дата окончания действия полиса') }}</label>

                                <div class="col-md-6">
                                    <input id="finishDate" type="date" class="form-control @error('finishDate') is-invalid @enderror" name="finishDate" value="{{ old('finishDate') }}" requiredautofocus>

                                    @error('finishDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gosNumber" class="col-md-4 col-form-label text-md-right">{{ __('Гос номер ТС') }}</label>

                                <div class="col-md-6">
                                    <input id="gosNumber" type="text" class="form-control @error('gosNumber') is-invalid @enderror" name="gosNumber" value="{{ old('gosNumber') }}" required autocomplete="gosNumber" autofocus>

                                    @error('gosNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <a  class="btn btn-outline-primary" href="#" id="filldetails" onclick="addFields()">Добавить водителей</a>
                            <div id="container"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg pull-right m-4">Создать</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    let i = 0;
    function addFields(){
        i++;
        let container = document.getElementById("container");
        let inputName = document.createElement("input");
        inputName.type = "text";
        inputName.name = "name" + i;
        inputName.style.marginRight = "20px";
        inputName.style.width = "400px";
        let labelName = document.createElement("Label");
        labelName.htmlFor = "name" + i;
        labelName.innerHTML="ФИО Водителя (" + i + ")";
        labelName.style.marginRight = "20px";

        let inputIin = document.createElement("input");
        inputIin.type = "text";
        inputIin.name = "iin" + i;
        
        let labelIin = document.createElement("Label");
        labelIin.htmlFor = "iin" + i;
        labelIin.innerHTML="ИИН Водителя (" + i + ")";
        labelIin.style.marginRight = "20px";

        container.appendChild(document.createElement("br"));
        container.appendChild(labelName);
        container.appendChild(inputName);
        container.appendChild(labelIin);
        container.appendChild(inputIin);
        container.appendChild(document.createElement("br"));
    }
</script>
@endsection
