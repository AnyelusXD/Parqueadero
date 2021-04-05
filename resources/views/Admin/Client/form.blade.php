@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
   <h2>REGISTRO DE DATOS BASICOS</h2>
@stop

@section('content')

    <form class="row g-3" action="{{$action}}" method="POST">

        @csrf

        @isset($client)
            @method('PUT')
        @endisset

        <div class="mb-3">

            <div class="form-group col-12">
                <label for="board">Placa</label>
                <input type="text" name="board" class="form-control" id="board" placeholder="Placa" value="{{old('board', $client->board ?? '')}}" required>
                @error('board')
                    <span class="text-muted text-danger font-weight-lighter"> {{$message}} </span>
                @enderror
            </div>

            <div class="form-group col-24">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nome" value="{{old('name', $client->name ?? '')}}">

                @error('name')
                    <span class="text-muted text-danger font-weight-lighter"> {{$message}} </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group col-12">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" name="celular" placeholder="celular" value="{{old('celular', $client->celular ?? '')}}">

            @error('celular')
                <span class="text-muted text-danger font-weight-lighter"> {{$message}} </span>
            @enderror
            </div>

            <div class="form-group col-12">
                <label for="type_vehicle">Tipo de Vehiculo</label>
                <input type="text" class="form-control" name="type_vehicle" placeholder="tipo de vehiculo" value="{{old('type_vehicle', $client->type_vehicle ?? '')}}">

            @error('type_vehicle')
                <span class="text-muted text-danger font-weight-lighter"> {{$message}} </span>
            @enderror
            </div>
        <div class="mb-3">
            <div class="row col-12">
                <button type="reset" class="btn btn-danger rounded-pill">
                    <a class="text-decoration-none text-white" href="{{route('clients.index')}}">Cancelar</a></button>
            </div>

            <div class="row col-12">
                <button type="submit" class="btn btn-success rounded-pill">
                    <a class="text-decoration-none text-white">Agregar Vehiculo</a></button>
            </div>
        </div>

        </div>
    </form>
@stop
