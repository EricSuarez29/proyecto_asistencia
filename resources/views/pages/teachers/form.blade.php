@extends('layouts.app')

@section('title', "$action Maestro")

@section('header')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('teachers.index') }}">Maestros</a></li>
                            <li class="breadcrumb-item active">{{ $action }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<div class='row justify-content-center'>
    <div class='col-lg-8'>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">{{ $action }} Maestro</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Nombre</label>
                                    <input type="text" id="input-first-name" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Apellido Paterno</label>
                                    <input type="text" id="input-last-name" class="form-control"
                                        placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Apellido Materno</label>
                                    <input type="text" id="input-last-name" class="form-control"
                                        placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-last-name">Estatus</label>
                                    <select class="form-control">
                                        <option value=''>Activo</option>
                                        <option value=''>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <input type='hidden' name='id' id="id">
                        </div>
                        <div class='text-right'>
                            <button type="submit" class='btn btn-primary'>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection