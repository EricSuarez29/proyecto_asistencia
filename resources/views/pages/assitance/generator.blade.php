@extends('layouts.app')

@section('title', 'Listas')

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
                            <li class="breadcrumb-item"><a href="{{ route('assistanceList.index') }}">Listas de
                                    Asistencia</a>
                            </li>
                            <li class="breadcrumb-item active">Generar
                                Lista</li>
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
    <div class='col-lg-12'>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Lista de asistencia</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('assistanceList.store') }}" method="POST">
                    <div class="pl-lg-4">
                        <div style="color:#5e72e4;">
                            <i class="fa-light fa-gear"></i>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Materia:</label>
                                    <select name="subject" class="form-control">
                                        <option selected>Selecione una Materia</option>
                                        @foreach (\App\Models\Subject::all() as $subject)
                                        <option value='{{ $subject->id }}'>{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form-control-label" for="input-first-name">Grupo:</label>
                                <select name="group" class="form-control">
                                    <option>Selecione un grupo</option>
                                    @foreach (\App\Models\Group::all() as $group)
                                    <option value='{{ $group->id }}'>{{ $group->getFullName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="color:#5e72e4;">
                            <label class="form-control-label">Días de Clase</label>
                        </div>

                        <div class="row m-0 row-cols-5">
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Lunes</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="checkMonday"
                                                    aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" class="form-control" name="mondayHours"
                                            aria-label="Text input with checkbox" placeholder="Horas">
                                    </div>
                                </div>
                            </div>
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Martes</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="checkTuesday"
                                                    aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" name="tuesdayHours" placeholder="Horas"
                                            class="form-control" aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Miercoles</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="checkWednesday"
                                                    aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" name="wednesdayHours" placeholder="Horas"
                                            class="form-control" aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Jueves</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="checkThursday"
                                                    aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" name="thursdayHours" placeholder="Horas"
                                            class="form-control" aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Viernes</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="checkFriday"
                                                    aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" name="fridayHours" placeholder="Horas" class="form-control"
                                            aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Sabado</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" placeholder="Horas" class="form-control"
                                            aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class='p-1'>
                                <div class="form-group">
                                    <label class="form-control-label">Domingo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="number" placeholder="Horas" class="form-control"
                                            aria-label="Text input with checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div style="color:#5e72e4;">
                                <label class="form-control-label">Intervalo del periodo</label>
                            </div>
                        </div>
                        <div class="input-daterange datepicker row align-items-center">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" name="startDatePeriod" placeholder="Fecha inicio"
                                            type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" name="endDatePeriod" placeholder="Fecha fin"
                                            type="text" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-6 form-group">
                                <label class="form-control-label" for="input-first-name">Tipo de periodo:</label>
                                <select class="form-control">
                                    <option selected></option>
                                    <option value="1">Cuatrimestre</option>
                                    <option value="2">Semestre</option>
                                    <option value="3">Ciclo anual</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="form-control-label">Parciales</label>
                        </div>
                        <div class="row m-0 align-items-center">
                            <div class='col-sm-4'>
                                <p class="form-control-label">Primer Parcial</p>
                            </div>
                            <div class='col-sm-8'>
                                <div class="input-daterange datepicker row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="startDateFirstPartial"
                                                    placeholder="Fecha inicio" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="endDateFirstPartial"
                                                    placeholder="Fecha inicio" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 align-items-center">
                            <div class='col-sm-4'>
                                <p class="form-control-label">Segundo Parcial</p>
                            </div>
                            <div class='col-sm-8'>
                                <div class="input-daterange datepicker row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="startDateSecondPartial"
                                                    placeholder="Fecha inicio" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="endDateSecondPartial"
                                                    placeholder="Fecha inicio" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 align-items-center">
                            <div class='col-sm-4'>
                                <p class="form-control-label">Tercer Parcial</p>
                            </div>
                            <div class='col-sm-8'>
                                <div class="input-daterange datepicker row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="startDateThirdPartial"
                                                    placeholder="Fecha inicio" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="endDateThirdPartial"
                                                    placeholder="Fecha inicio" type="text" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='d-flex justify-content-center py-4'>
                        <button class='btn btn-primary' type='submit'>Generar Lista</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection