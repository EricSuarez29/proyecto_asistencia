@extends('layouts.app')

@section('title', 'Grupos')

@section('header')
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a class="text-default" href="/"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Grupos
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
<div class="row">
    <div class="col">
        <div class="card">

            <div class="card-header border-0">
                <h3 class="mb-0">Grupos</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Carrera</th>
                            <th scope="col" class="sort" data-sort="budget">Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($groups as $group)
                        <tr>
                            <td>
                                <span class="name mb-0 text-sm">{{ $group->career->acronym }}</span>
                            </td>
                            <td class="budget">
                                {{ $group->number }}
                            </td>
                            <td>
                                <a href="{{ route('group.show', $group ) }}" class='btn btn-outline-info btn-sm'>
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
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