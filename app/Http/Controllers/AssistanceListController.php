<?php

namespace App\Http\Controllers;

use App\Models\AttendanceList;
use App\Models\ClassDay;
use App\Models\ClassHour;
use App\Models\Partial;
use App\Models\Period;
use Carbon\CarbonPeriod;
use DateTime;
use Illuminate\Http\Request;

class AssistanceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendanceList = AttendanceList::all();
        return view('pages.assitance.list', ['attendanceListes' => $attendanceList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.assitance.generator');
    }

    private static function getFormatedDate($date)
    {
        $dateSlited = explode('/', $date);
        return "$dateSlited[2]-$dateSlited[0]-$dateSlited[1]";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Intervalo del periodoo
        /*for ($i = $fecha_incio; $i <= $fecha_fin; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
            array_push($arreglo_fechas, $i);
            array_push($arreglo_numeros, intval(date_format(new DateTime($i), 'w')));
        }

        foreach ($arreglo_numeros as $key => $fecha_en_numero) {
            foreach ($request->dias_clase as $dia_clase) {
                if ($fecha_en_numero == $dia_clase['dia']) {
                    array_push($arreglo_fechas_clase, $arreglo_fechas[$key]);
                }
            }
        }*/

        $request->validate([
            'group' => 'required',
            'subject' => 'required',
            'periodType' => 'required',
            'startDateFirstPartial' => 'required|confirmed',
            'endDateFirstPartial' => 'required',
            'startDateSecondPartial' => 'required',
            'endDateSecondPartial' => 'required',
            'startDateThirdPartial' => 'required',
            'endDateThirdPartial' => 'required|confirmed',
        ]);

        $period = Period::create([
            'start_period' => (new static)::getFormatedDate($request['startDateFirstPartial']),
            'end_period' => (new static)::getFormatedDate($request['endDateThirdPartial']),
            'period_type_id' => (int) $request['periodType']
        ]);

        Partial::create([
            'start_first_partial' => (new static)::getFormatedDate($request['startDateFirstPartial']),
            'end_first_partial' => (new static)::getFormatedDate($request['endDateFirstPartial']),
            'start_second_partial' => (new static)::getFormatedDate($request['startDateSecondPartial']),
            'end_second_partial' => (new static)::getFormatedDate($request['endDateSecondPartial']),
            'start_third_partial' => (new static)::getFormatedDate($request['startDateThirdPartial']),
            'end_third_partial' => (new static)::getFormatedDate($request['endDateThirdPartial']),
            'period_id' => $period->id
        ]);

        $attendanceList = AttendanceList::create([
            'period_id' => $period->id,
            'group_id' => (int) $request['group'],
            'subject_id' => (int) $request['subject']
        ]);

        // TODO Filter by inhabil dates
        $rangeDates = CarbonPeriod::create($period['start_period'], $period['end_period']);

        //dd($request->all());
        $classDatesFormated = collect($rangeDates)
            ->filter(fn ($date) => $request[$date->format('l')])
            ->map(fn ($classDate) => ['class_date' => $classDate, 'hours' => (int) $request[strtolower($classDate->format('l')) . "Hours"]]);

        foreach ($classDatesFormated as $classDate) {
            $classDay = ClassDay::create([
                'class_date' => $classDate['class_date'],
                'hours' => (int) $classDate['hours'],
                'attendance_list_id' => $attendanceList->id
            ]);

            foreach (range(1, $classDay['hours']) as $order) {
                ClassHour::create([
                    'order' => $order,
                    'class_day_id' => $classDay->id
                ]);
            }
        }

        return redirect()->route('assistanceList.index');

        /*
        foreach ($arreglo_fechas_clase as $fecha_clase) {
            if (!in_array($fecha_clase, $request->dias_inhabiles)) {
                array_push($arreglo_fechas_sin_dias_inhabiles, $fecha_clase);
            }
        }

        //Guardamos los datos del periodo
        $period = new Period($request->all());
        $period->save();
        $id_period = $period->id;

        //Recorremos el arreglo de fechas inhabiles para guardarlos
        foreach ($request->dias_inhabiles as $key => $dia_inhabil) {
            $detail_period = new PeriodDetail();
            $detail_period->non_working_day = $dia_inhabil;
            $detail_period->period_id = $id_period;
            $detail_period->save();
        }

        //Guardamos los datos de los parciales
        $partials = new Partial($request->all());
        $partials->period_id = $id_period;
        $partials->save();

        //Guardamos la lista
        $list = new AttendanceList($request->all());
        $list->period_id = $id_period;
        $list->save();
        $list_id = $list->id;

        //Guardamos los dias de clase con sus horas
        foreach ($arreglo_fechas_sin_dias_inhabiles as $fecha_clase) {
            $num_fecha = intval(date_format(new DateTime($fecha_clase), 'w'));
            foreach ($request->dias_clase as $dia_clase) {
                if ($num_fecha == $dia_clase['dia']) {
                    $dia_clase_ = new ClassDay();
                    $dia_clase_->class_date = $fecha_clase;
                    $dia_clase_->hours = $dia_clase['clases'];
                    $dia_clase_->attendance_list_id = $list_id;
                    $dia_clase_->save();
                    for ($i = 0; $i < $dia_clase['clases']; $i++) {
                        //Generamos la lista de asistencia para cada alumno
                        $alumnos = Group::find($request->group_id)->students()->get();
                        foreach ($alumnos as $alumno) {
                            $student_attendance = new StudentAttendance();
                            $student_attendance->student_id = $alumno['id'];
                            $student_attendance->class_date = $fecha_clase;
                            $student_attendance->class_day_id = $dia_clase_->id;
                            $student_attendance->save();
                        }
                    }
                }
            }
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceList $attendanceList)
    {
        return view('pages.assitance.detail', ['attendanceList' => $attendanceList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
