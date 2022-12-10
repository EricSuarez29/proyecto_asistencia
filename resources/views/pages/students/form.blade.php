@extends('layouts.app')

@section('title', 'Alumno')

@push('scripts')
@vite(['resources/js/student.js'])
@endpush

@section('header')
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Alumnos</a>
                            </li>
                            <li class="breadcrumb-item active">Formulario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('main')
{{-- Formulario de géneral de Alumno --}}
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h3 class="mb-0">Alumno</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class='row'>
            <div class='col-12'>
                <div class="card" style="margin-left: 30px;">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Agregar alumno</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('students.store') }}" method="POST">
                                @csrf
                                <div class="pl-lg-2">
                                    {{-- Campos para agregar alumno --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-first-name">Nombre(s):</label>
                                                <input type="text" id="input-first-name" name="input-first-name"
                                                    class="form-control" placeholder="Nombre(s)" @if($student)
                                                    value="{{ $student->name }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-paternal-last-name">Apellido paterno:</label>
                                                <input type="text" id="input-paternal-last-name"
                                                    name="input-paternal-last-name" class="form-control"
                                                    placeholder="Apellido paterno" @if($student)
                                                    value="{{ $student->middle_name }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-maternal-last-name">Apellido materno:</label>
                                                <input type="text" id="input-maternal-last-name"
                                                    name="input-maternal-last-name" class="form-control"
                                                    placeholder="Apellido materno" @if($student)
                                                    value="{{ $student->last_name }}" @endif>
                                            </div>
                                        </div>
                                        <input type='hidden' name='id' id="id">
                                    </div>
                                    {{-- Fin de Campos para agregar alumno --}}
                                </div>
                                <div class='d-flex justify-content-center w-100 my-3'>
                                    <button type="submit" class="btn btn-outline-default">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection