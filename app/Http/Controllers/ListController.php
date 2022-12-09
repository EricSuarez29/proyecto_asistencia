<?php

namespace App\Http\Controllers;

use App\Models\AttendanceList;
use App\Models\ClassDay;
use App\Models\Group;
use App\Models\Partial;
use App\Models\Period;
use App\Models\PeriodDetail;
use App\Models\StudentAttendance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($teacher_id)
    {
        $response_flag = 3;
        $result = null;
        $trace = null;
        try{
            $lists = AttendanceList::join('groups', 'groups.id', '=', 'lists.groups.id')
            ->join('careers', 'careers.id', '=', 'groups.career_id')
            ->join('subjects', 'subjects.id', '=', 'lists.subject_id')
            ->select('lists.id', DB::raw('CONCAT_WS(careers.acronym, groups.number, "-", subjects.name) AS list_name'))
            ->where('lists.teacher_id', '=', $teacher_id)
            ->order_by('lists.id')
            ->get();
            $result = $lists;
            $response_flag = 1;
        }catch (\ErrorException $e) {
            $response_flag = 2;
            $result = $e->getMessage();
            $trace = $e->getTrace();
        } catch (\Illuminate\Database\QueryException $e) {
            $response_flag = 2;
            $result = $e->errorInfo[2];
            $trace = $e->getTrace();
        } finally {
            $data = [
                "response" => $result,
                "response_flag" => $response_flag,
                "trace" => $trace
            ];
            return response()->json($data, 200, [JSON_UNESCAPED_UNICODE]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response_flag = 3;
        $result = null;
        $trace = null;
        try{
            $fecha_incio = $request->start_period;
            $fecha_fin = $request->end_period;
            $arreglo_fechas = [];
            $arreglo_numeros = [];
            $arreglo_fechas_clase = [];
            $arreglo_fechas_sin_dias_inhabiles = [];

            for($i = $fecha_incio; $i <= $fecha_fin; $i = date("Y-m-d", strtotime($i . "+ 1 days"))) {
                array_push($arreglo_fechas, $i);
                array_push($arreglo_numeros, intval(date_format(new DateTime($i), 'w')));
            }

            foreach($arreglo_numeros as $key => $fecha_en_numero){
                foreach($request->dias_clase as $dia_clase){
                    if($fecha_en_numero == $dia_clase['dia']){
                        array_push($arreglo_fechas_clase, $arreglo_fechas[$key]);
                    }
                }
            }
            foreach($arreglo_fechas_clase as $fecha_clase){
                if(!in_array($fecha_clase, $request->dias_inhabiles)){
                    array_push($arreglo_fechas_sin_dias_inhabiles, $fecha_clase);
                }
            }

            //Guardamos los datos del periodo
            $period = new Period($request->all());
            $period->save();
            $id_period = $period->id;

            //Recorremos el arreglo de fechas inhabiles para guardarlos
            foreach($request->dias_inhabiles as $key => $dia_inhabil){
                $detail_period = new PeriodDetail();
                $detail_period->non_working_day = $dia_inhabil   ;
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
            foreach($arreglo_fechas_sin_dias_inhabiles as $fecha_clase){
                $num_fecha = intval(date_format(new DateTime($fecha_clase), 'w'));
                foreach($request->dias_clase as $dia_clase){
                    if($num_fecha == $dia_clase['dia']){
                        $dia_clase_ = new ClassDay();
                        $dia_clase_->class_date = $fecha_clase;
                        $dia_clase_->hours = $dia_clase['clases'];
                        $dia_clase_->attendance_list_id = $list_id;
                        $dia_clase_->save();
                        for($i=0; $i < $dia_clase['clases']; $i++){
                            //Generamos la lista de asistencia para cada alumno
                            $alumnos = Group::find($request->group_id)->students()->get();
                            foreach($alumnos as $alumno){
                                $student_attendance = new StudentAttendance();
                                $student_attendance->student_id = $alumno['id'];
                                $student_attendance->class_date = $fecha_clase;
                                $student_attendance->class_day_id = $dia_clase_->id;
                                $student_attendance->save();
                            }
                        }
                    }
                }
            }

            $response_flag = 1;
        }catch (\ErrorException $e) {
            $response_flag = 2;
            $result = $e->getMessage();
            $trace = $e->getTrace();
        } catch (\Illuminate\Database\QueryException $e) {
            $response_flag = 2;
            $result = $e->errorInfo[2];
            $trace = $e->getTrace();
        } finally {
            $data = [
                "response" => $result,
                "response_flag" => $response_flag,
                "trace" => $trace
            ];
            return response()->json($data, 200, [JSON_UNESCAPED_UNICODE]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
