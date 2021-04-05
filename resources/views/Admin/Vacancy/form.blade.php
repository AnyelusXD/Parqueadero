@extends('adminlte::page')

@section('title', 'INGRESO')

@section('content_header')
   <h2>REGISTRO INGRESO DEL VEHICULO</h2>
@stop

@section('content')

    <form class="row g-3" action="{{$action}}" method="POST">

        @csrf

        <div class="row">

            <div class="form-group col-6" >
                <label for="my-select">Selecione o cliente</label>
                <select id="my-client_id" class="custom-select" name="client_id" required>
                    <option value="" disabled selected>Selecione o cliente</option>
                    @foreach ($clients as $client)
                        @if ($client->occupation == 0)
                            <option value="{{$client->id}}">{{$client->board}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label for="my-select">Selecione la Bahia</label>
                <select id="my-bahia_id" class="custom-select" name="bahia_id" required>
                    <option value="" disabled selected>Selecione o cliente</option>
                    @foreach ($bahias as $bahia)
                        @if ($bahia->estado == "DISPONIBLE")
                            <option value="{{$bahia->id}}">{{$bahia->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label for="parking_id">Selecciones el Tipo de Pago</label>
                <select id="parking_id" class="custom-select" name="parking_id" required>
                    <option value="" disabled selected>Selecione o cliente</option>
                    @foreach ($parkings as $parking)
                        <option value="{{$parking->id}}">{{$parking->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="row">
            <div class="form-group col-8 ">
                <label for="entry_time">Horario de entrada</label>
            <input type="text" class="form-control" name="entry_time" id="entry_time" value="{{$hoursTime}}" placeholder="Hora Actual" readonly>
            </div>
            <div class="form-group col-4">
                <button type="reset" class="btn btn-danger rounded-pill">
                    <a class="text-decoration-none text-white" href="{{url()->previous()}}">Cancelar</a></button>
            </div>

            <div class="form-group col-4">
                <button type="submit" class="btn btn-success rounded-pill">
                    <a class="text-decoration-none text-white">Ingresar Vehiculo</a></button>
            </div>
    </form>

</section>
@stop
