@extends('layouts.admin')

@section('contenido')
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nuevo Mueble</h3>
        </div>
        <form action="{{ route('mueble.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="mueble">Mueble</label>
                    <input type="text" class="form-control" name="mueble" id="mueble" placeholder="Ingresa el nombre del mueble">
                </div>
                <div class="form-group">
                    <label for="material">Material</label>
                    <input type="text" class="form-control" name="material" id="material" placeholder="Ingresa el material del mueble">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" step="0.01" class="form-control" name="precio" id="precio" placeholder="Ingresa el precio del mueble">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('mueble.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection