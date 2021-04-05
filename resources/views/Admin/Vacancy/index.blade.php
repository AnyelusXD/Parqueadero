@extends('adminlte::page')

@section('title', 'Salida')

@section('content_header')
   <h2>Vehiculos En Parqueadero</h2>
@stop

@section('content')

    <div class="d-flex flex-row bd-highlight justify-content-end mb-2">
        <div>
            <button type="button" class="btn btn-success rounded-pill" onclick="window.location='{{route('vagas.create')}}'">Ingresar Vehiculo</button>
        </div>
    </div>



    <div class="d-flex flex-row bd-highlight">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Estacionamento</th>
                <th scope="col">Placa</th>
                <th scope="col">Motorista</th>
                <th scope="col">Horario Entrada</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($vacancies as $vacancy)
                <tr>
                    @if ($vacancy->exit_time == null)
                        <tr>
                            <td>{{$vacancy->id}}</td>
                            <td>{{$vacancy->parking->name}}</td>
                            <td>{{$vacancy->client->board}}</td>
                            <td>{{$vacancy->client->name}}</td>
                            <td>{{$vacancy->entry_time}}</td>
                            <td>
                                <a class="btn btn-danger" role="button" href="{{route('vagas.edit',$vacancy->id)}}">Salida</a>
                            </td>
                        </tr>
                    @endif

                @empty
                <td><p>Entrada de Vehiculo</p></td>

                @endforelse
            </tbody>
          </table>
    </div>

</section>

@stop
