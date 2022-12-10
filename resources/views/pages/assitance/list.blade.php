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
                            <li class="breadcrumb-item"><a class="text-default" href="/"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active">
                                Grupos
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('assistanceList.create') }}" class="btn btn-neutral text-default">Crear Lista</a>
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
            @foreach ($attendanceListes as $attendanceList)
            <div class='p-2'>
                <a href="{{ route('assistanceList.show', $attendanceList) }}" class='card'>
                    <div class='card-body'>
                        <h1 class="card-title mb-0">{{ $attendanceList->group->getFullName() }}</h1>
                        <p>{{ $attendanceList->subject->name }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection