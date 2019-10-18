@extends('layouts.appBase')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="inner-box" action="{{route('notification.send')}}" method="post">
                    @csrf
                    <div class="col-6">

                        <div class="form-group">
                            <label>Titulo </label>
                            <input type="text" class="form-control form-control-line" value="Titulo laravel" name="title">
                        </div>

                        <div class="form-group">
                            <label>Mensaje </label>
                            <textarea class="form-control" rows="5" name="body"> Mensaje desde laravel </textarea>
                        </div>
                    </div>

                    <label> Programar envío </label>

                    <div class="col-6">

                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Dia">
                            <input type="number" class="form-control" placeholder="Mes">
                            <input type="number" class="form-control" placeholder="Año">
                        </div>
                        <br>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Hora">
                            <input type="number" class="form-control" placeholder="Minuto">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success btn-block col-6 waves-effect waves-light m-r-10">Enviar</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
