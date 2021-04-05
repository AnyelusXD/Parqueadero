@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
   <h2>Clientes Registrados</h2>
@stop

@section('content')

    <div class="d-flex flex-row bd-highlight justify-content-end mb-2">
        <div>
            <button type="button" class="btn btn-success rounded-pill" onclick="window.location='{{route('clients.create')}}'">Agregar Vehiculo</button>
        </div>
    </div>

    <div class="panel-body">
        <table class="table table-striped">

              <tr>
                <th scope="col">ID</th>
                <th scope="col">Motorista</th>
                <th scope="col">Placa</th>
                <th scope="col">Celular</th>
                <th scope="col">Tipo de vehiculo</th>
                <th scope="col">Acciones</th>
              </tr>

            <tbody>
                @forelse ($clients as $client)
              <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->board}}</td>
                <td>{{$client->celular}}</td>
                <td>{{$client->type_vehicle}}</td>
                <td class="text-center">
                    {{-- Editar --}}
                    <form style="display: inline;"  method="POST" action="{{route('clients.edit',$client->id)}}">                
                      @method('EDIT')
                      <button disabled type="submit" class="btn btn-primary btn-sm" title="Editar" onclick="return confirm('El Registro no Puede ser Eliminado')">
                        <i class="far fa-edit"></i>
                      </button>
                    </form>

                    {{-- Excluir --}}
                    <form style="display: inline;"  method="POST" action="{{route('clients.destroy', $client->id)}}">                
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" title="Borrar" onclick="return confirm('¿Estas seguro de eliminar este registro?')">
                        <i class="far fa-trash-alt"></i>
                      </button>
                    </form>
                </td>
              </tr>
              @empty
                <td>Registro Vehiculos</td>
                @endforelse
            </tbody>
          </table>
    </div>
@stop
