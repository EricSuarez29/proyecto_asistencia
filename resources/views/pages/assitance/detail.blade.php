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
                            <li class="breadcrumb-item"><a class="text-default" href="/"><i class="fas fa-home"></i></a>
                            </li>
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
        <h3 class="mb-0">
            {{ $attendanceList->group->getFullName() }} - {{ $attendanceList->subject->name }}
        </h3>
    </div>

    <livewire:assistance-list :attendanceList="$attendanceList" />

</div>
@endsection