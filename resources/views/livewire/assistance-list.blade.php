<div>
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

                        <tr>
                            <td colspan="2" class="text-right">Asistencias Totales de la Clase</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-7 px-0'>
            <div class="table-responsive">
                <table class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            @foreach ($attendanceList->classDays as $classDay)
                            <th colspan="{{ $classDay->classHours()->count() }}"
                                class="text-center px-0 border border-right " style="word-wrap: break-word;">{{
                                $classDay->getFormated()
                                }}</th>
                            @endforeach
                            <th class="w-100"></th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        @foreach ($attendanceList->group->students as $id => $student)
                        <tr>
                            @foreach ($attendanceList->classDays as $classDay)
                            @foreach($classDay->classHours as $index => $classHour)
                            <td wire:key="hour-field-{{ $classHour->id . '-' . $student->id }}"
                                style="word-wrap: break-word;" class="p-0 text-white text-center">
                                <input type='text'
                                    wire:change="changeText({{$classHour->id}}, {{$student->id}}, $event.target.value)"
                                    value="{{ $student->getTypeOfAssistanceAt($classHour)['status'] }}"
                                    class="form-control text-uppercase text-center {{ $student->getBgColorAssistance($classHour) }}"
                                    style="width: 50px; height: 51.5px;">
                            </td>
                            @endforeach
                            @endforeach
                        </tr>
                        @endforeach

                        <tr>
                            @foreach ($attendanceList->classDays as $classDay)
                            @foreach($classDay->classHours as $index => $classHour)
                            <td wire:key="hour-field-{{ $classHour->id . '-' . $student->id }}"
                                style="word-wrap: break-word;" class="p-0 text-white text-center">
                                <input type='text' disabled value="{{ $classHour->getTotalAssistances() }}"
                                    class="form-control text-uppercase text-center"
                                    style="width: 50px; height: 51.5px;">
                            </td>
                            @endforeach
                            @endforeach
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-2 px-0'>
            <div class="table-responsive">
                <table class="table table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">(%) Asistencia</th>
                        </tr>
                    </thead>
                    <tbody class="list">

                        @foreach ($attendanceList->group->students as $student)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="completion mr-2">{{ $student->getPerAssistance($attendanceList)
                                        }}%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar {{ $student->getPerAssistance($attendanceList) > 70 ? 'bg-success': 'bg-warning' }} "
                                                role="progressbar"
                                                aria-valuenow="{{ $student->getPerAssistance($attendanceList) }}"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $student->getPerAssistance($attendanceList) }}%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class='my-5 d-flex justify-content-center'>
        <a href="{{ route('assistanceList.index') }}" class='btn btn-primary' type="submit">Guardar</a>
    </div>
</div>