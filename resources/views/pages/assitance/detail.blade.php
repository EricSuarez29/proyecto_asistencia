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

                        @foreach ($attendanceList->group->students as $i => $student)
                        <tr>
                            <td>
                                {{ $i + 1 }}
                            </td>
                            <td>
                                {{ $student->getFullName() }}
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
                            @foreach ($attendanceList->classDays as $classDay)
                            <th colspan="{{ $classDay->classHours()->count() }}"
                                class="text-center px-0 border border-right "
                                style="word-wrap: break-word; transform: rotate(90deg)">{{
                                $classDay->getFormated()
                                }}</th>
                            @endforeach
                            <th class="w-100"></th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        @foreach ($attendanceList->group->students as $student)
                        <tr>
                            @foreach ($attendanceList->classDays as $classDay)
                            @foreach($classDay->classHours as $classHour)
                            <td style="word-wrap: break-word;"
                                class="{{ $student->getTypeOfAssistanceAt($classHour)['type'] == 'A' ? 'bg-success' : '' }} p-0  text-white text-center">
                                <input type='text' class="form-control" style="width: 50px">
                            </td>
                            @endforeach
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