@extends('layouts.app')

@section('title', 'Maestros')

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
                            <li class="breadcrumb-item active">
                                Maestros
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('teachers.create') }}" class="btn btn-neutral">Nuevo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
<div class="row">
    <div class="col">
        <div class="card">

            <div class="card-header border-0">
                <h3 class="mb-0">MAESTROS</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Nombre</th>
                            <th scope="col" class="sort" data-sort="budget">Apellidos</th>
                            <th scope="col" class="sort" data-sort="status">Estatus</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr>
                            <td>
                                <span class="name mb-0 text-sm">Camaras</span>
                            </td>
                            <td class="budget">
                                Camaritas
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">Activo</span>
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('teachers.show', 'hola' ) }}" class='btn btn-outline-primary btn-sm'>
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    </div>
</div>
@endsection