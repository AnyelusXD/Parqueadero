@extends('adminlte::page')

@section('title', 'Lugares')

@section('content_header')
   <h2>Parqueadero</h2>
@stop

@section('content')


    <form action="{{$action}}" method="POST">

        @csrf
        @method('PUT')


        <div class="row">

            <div class="form-group col-5">
                <label for="parking_id">Estacionamento</label>
                <input disabled type="text" name="parking_id" class="form-control" placeholder="Placa" value="{{$vacancy->parking->name}}">
            </div>

            <div class="form-group col-3">
                <label for="board">Placa</label>
                <input disabled type="text" name="board" class="form-control" placeholder="Placa" value="{{$vacancy->client->board}}">
            </div>

            <div class="form-group col-4">
                <label for="name">Nombre</label>
                <input disabled type="text" class="form-control" name="name" placeholder="Nome" value="{{$vacancy->client->name}}">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-4">
                <label for="entry_time">Horario de Entrada</label>
                <input disabled type="text" class="form-control" name="entry_time" placeholder="Horario de entrada" value="{{$vacancy->entry_time}}">
            </div>

            <div class="form-group col-4">
                <label for="exit_time">Horario de Salida</label>
                <input type="text" class="form-control" name="exit_time" placeholder="Horario de saida" value="{{$hoursTime}}">
            </div>

            <div class="form-group col-2 text-right">
                <button type="reset" class="btn btn-warning rounded-pill">
                    <a class="text-decoration-none text-white" href="{{route('vagas.index')}}">Cancelar</a></button>
            </div>

            <div class="form-group col-2 text-right">
                <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#modalFormExit">
                    <a class="text-decoration-none text-white">Cobrar</a></button>
            </div>

        </div>

        <div class="modal fade" id="modalFormExit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Salida de Vehiculo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <strong><p>Deseja confirmar la salida del Vehiculo</p></strong>
                    <p name="price_total">Valor a pagar: ${{number_format($priceFinal, 2, '.', ',')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-primary">Si</button>
                </div>
              </div>
            </div>
          </div>

    </form>



</section>
@stop
