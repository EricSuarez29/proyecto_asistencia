@extends('layouts.app')

@section('title', 'Lista de Asistencia')

@section('header')
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a class="text-default" href="{{ route('dashboard') }}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active">
                                Lista de Asistencia
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('group.create') }}" class="btn btn-neutral text-default">Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<div class="card">

    <div class="card-header border-0">
        <h3 class="mb-0">IDCG 704 - Administración del Tiempo</h3>
    </div>

    <div class='row m-0'>
        <div class='col-3 px-0'>
            <div class="table-responsive">
                <table class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-2">#</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        @foreach (range(0, 20) as $i)
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Eric Suarez Loera
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-9 px-0'>
            <div class="table-responsive">
                <table class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            @foreach (range(0, 40) as $i)
                            <th>{{ $i }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="list">

                        @foreach (range(0, 20) as $i)
                        <tr>
                            @foreach (range(0, 40) as $i)
                            <td class="{{ $i < 20 ? 'bg-success' : '' }} text-white">
                                A
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class='my-5 d-flex justify-content-center'>
        <button class='btn btn-primary'>Guardar</button>
    </div>

</div>
@endsection