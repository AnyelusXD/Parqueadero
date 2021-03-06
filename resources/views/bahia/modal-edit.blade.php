<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditBahia-{{$bahia->id}}" style="float:left">
<i class="far fa-edit"></i>
</button>

{!! Form::open(['action' => ['BahiaController@update', $bahia->id], 'method' => 'PATCH']) !!}
{{Form::token()}}
<div class="modal fade" id="EditBahia-{{$bahia->id}}" tabindrol="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h class="modal-title" id="exampleModalLabel">Editar Lugares</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('bahia.update', $bahia->id)}}" method="POST">
        @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre Lugar</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{$bahia->name}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">estado</label>
            <input type="text" name="estado" class="form-control" id="recipient-estado" value="{{$bahia->estado}}" readonly>
 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}