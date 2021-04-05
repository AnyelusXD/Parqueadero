@extends('adminlte::page')

@section('title', 'Informe')

@section('content_header')
   <h2>Informe</h2>
@stop

@section('content')

<div class="btn btn-sm-success" >
    <a href="{{ url('#') }}"  >Imprimir</a>
</div>


    <div class="d-flex flex-row bd-highlight">
        <table class="table table-striped">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Estacionamento</th>
                <th scope="col">Placa</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Lugar Estacionamiento</th>
                <th scope="col">Horario Entrada</th>
                <th scope="col">Horario Salida</th>
                <th scope="col">Precio Final</th>
              </tr>
            </thead>
            <tbody>

                

                @forelse ($vacancies as $vacancy)
                <tr>
                    @if ($vacancy->exit_time != null)
                        <tr>
                            <td>{{$vacancy->id}}</td>
                            <td>{{$vacancy->parking->name}}</td>
                            <td>{{$vacancy->client->board}}</td>
                            <td>{{$vacancy->client->name}}</td>
                            <td>{{$vacancy->bahia->name}}</td>
                            <td>{{$vacancy->entry_time}}</td>
                            <td>{{$vacancy->exit_time}}</td>
                            <td>$ {{$vacancy->price_total}}</td>
                        </tr>
                    @endif

                @empty
                <td><p>Informe clientes</p></td>

                @endforelse
            </tbody>
          </table>
    </div>

@stop
