@extends('adminlte::page')

@section('title', 'TARIFAS')

@section('content_header')
   <h2>TARIFAS</h2>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Tarifas parqueadero</span>
          @include('parking.modal')
       </strong>
       <!-- SEARCH FORM -->
       <form class="form-inline my-2 my-lg-0">             
            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar...">
            <button class="btn btn-navbar" type="submit">
                  <i class="fa fa-search"></i>
            </button>       
          </form>
  
          <h4>
              @if($search)
              <div class="alert alert-success" role="alert">
                  El resultado de la busqueda de '{{$search}}' es:
              </div>
              @endif
          </h4>
          
      </div>
       <div class="panel-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th class="text-center">Nombre Tarifa</th>
              <th class="text-center" style="width: 15%;">Precio x Hora</th>
              <th class="text-center" style="width: 100px;">Acciones</th>
            </tr>
          </thead>
          <tbody>
          @foreach($parkings as $parking)
            <tr>
             <td class="text-center">{{$parking->id}}</td>
             <td class="text-center">{{$parking->name}}</td>
             <td class="text-center">{{$parking->price_hours}}</td>

             
             <td class="text-center" title="Modificar">
             @include('parking.modal-edit')
             <form method="POST" action="{{route('parking.destroy',$parking->id)}}">    
                  @csrf            
                  @method('DELETE')
                  <button type="submit" title="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este registro?')">
                    <i class="far fa-trash-alt"></i>
                  </button>
              </form>
             </td>
            </tr>
          @endforeach
         </tbody>
       </table>
       <div class="row">
      <div class="mx-auto">
        {{$parkings->links()}}
      </div>
    </div>
       </div>
      </div>
    </div>
  </div>
@stop