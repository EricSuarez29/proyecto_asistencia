@extends('layouts.app')

@section('title', 'Listas de Asistencia')

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
                                Grupos
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('group.create') }}" class="btn btn-neutral text-default">Crear Lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<div class="card">

    <div class="card-header border-0">
        <h3 class="mb-0">Listas de Asistencia</h3>
    </div>

    <div class='p-5'>
        <div class='row row-cols-sm-2 row-cols-lg-4'>
            <a href="{{ route('assistanceList.show', 'som') }}" class='card'>
                <div class='card-body'>
                    <h1 class="card-title mb-0">IDSG 704</h1>
                    <p>Administración del tiempo</p>
                </div>
            </a>
        </div>
    </div>

    <div class="card-footer py-4">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection