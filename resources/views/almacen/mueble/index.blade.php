@extends('layouts.admin')

@section('contenido')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">LISTADO DE MUEBLES</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Muebles</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('mueble.index') }}" method="get">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" name="texto" placeholder="Buscar muebles" value="{{ $texto }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                        <a href="{{ route('mueble.create') }}" class="btn btn-success">Nuevo</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Mueble</th>
                                        <th>Material</th>
                                        <th>Precio</th>
                                        <th>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($muebles as $mueble)
                                    <tr>
                                        <td>
                                            <a href="{{ route('mueble.edit', $mueble->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $mueble->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                        <td>{{ $mueble->mueble }}</td>
                                        <td>{{ $mueble->material }}</td>
                                        <td>{{ $mueble->precio }}</td>
                                        <td>
                                            @if ($mueble->imagen)
                                            <img src="(http://localhost/examen/public/imagenes/muebles/{{$mueble->imagen}}" alt="{{ $mueble->imagen }}" height="70px" width="70px" class="img-thumbnail">
                                            @endif
                                        </td>
                                    </tr>
                                    @include('almacen.mueble.modal')
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $muebles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection