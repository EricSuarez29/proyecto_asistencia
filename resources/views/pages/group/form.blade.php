@extends('layouts.app')

@section('title', 'Grupo')

@push('scripts')
@vite(['resources/js/group.js'])
@endpush

@section('header')
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                        class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Grupos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('main')
{{-- Formulario de géneral de Grupo --}}
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">Grupo</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form>
            @csrf
            <div class="pl-lg-4">
                <div class="row">
                    {{-- Campos para agregar grupo --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Carrera</label>
                            <select id="se" class="form-control">
                                <option selected>Seleccionar...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Número de grupo</label>
                            <input type="text" id="input-last-name" class="form-control" placeholder="Número de grupo">
                        </div>
                    </div>
                </div>
                <input type='hidden' name='id' id="id">
            </div>
            <div class='row'>
                <div class='col-lg-4'>
                    <div class="card" style="margin-left: 30px;">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Agregar alumnos</h3>
                                    </divc>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    @csrf
                                    <div class="pl-lg-2">
                                        {{-- Campos para agregar alumno --}}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label"
                                                        for="input-first-name">Matrícula</label>
                                                    <input type="number" id="input-first-name" class="form-control"
                                                        placeholder="Matrícula">
                                                </div>
                                                <div class="text-right">
                                                    <button type="button"
                                                        class="btn btn-outline-default">Agregar</button>
                                                </div>
                                            </div>
                                            <input type='hidden' name='id' id="id">
                                        </div>
                                        {{-- Fin de Campos para agregar alumno --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-lg-8'>
                    <div class="card" style="margin-right: 30px;">
                        <div class="card-header border-0">
                            <h3 class="mb-0 text-center">Listado de Alumnos</h3>
                        </div>
                        <div class="table-responsive">
                            {{-- Tabla de alumnos --}}
                            <table class="table table-hover align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="budget">Matrícula</th>
                                        <th scope="col" class="sort" data-sort="name">Nombre</th>
                                        <th scope="col" class="sort" data-sort="status">Estatus</th>
                                        <th scope="col" class="sort" data-sort="delete">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <td class="budget">
                                            20000001
                                        </td>
                                        <td>
                                            <span class="name mb-0 text-sm">Iván Moisés Ornelas Meza</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>Activo
                                                <span class="status"></span>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('group.show', 'hola') }}"
                                                class='btn btn-outline-danger btn-sm'>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='d-flex justify-content-center w-100 my-3'>
                    <button type="submit" class="btn btn-outline-default">Guardar</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection