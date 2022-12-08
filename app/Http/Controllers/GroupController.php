<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class GroupController extends Controller
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
        try {
            $groups = Group::join('careers', 'careers.id', '=', 'groups.career_id')
                ->select('groups.id', DB::raw('CONCAT(careers.acronym, groups.number) AS group_name'))
                ->where('groups.teacher_id', '=', $teacher_id)
                ->orderBy('groups.id')
                ->get();
            $result = $groups;
            $response_flag = 1;
        } catch (\ErrorException $e) {
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
        try {
            $group = new Group($request->all());
            $group->save();
            foreach ($request->alumnos as $key => $alumno) {
                $group->students()->attach($alumno['id']);
            }
            $response_flag = 1;
        } catch (\ErrorException $e) {
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
        $response_flag = 3;
        $result = new stdClass();
        $trace = null;
        try {
            $group = Group::find($id);
            $students = $group->students()->get();
            $result = [$group, $students];
            $response_flag = 1;
        } catch (\ErrorException $e) {
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
        $response_flag = 3;
        $result = null;
        $trace = null;
        try {
            $group = Group::find($id);
            $group->number = $request->number;
            $group->career_id = $request->career_id;
            $group->save();
            $group->students()->sync([]);
            foreach ($request->alumnos as $key => $alumno) {
                $group->students()->attach($alumno['id']);
            }
            $response_flag = 1;
        } catch (\ErrorException $e) {
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response_flag = 3;
        $result = null;
        $trace = null;
        try {
            $group = Group::find($id);
            $group->students()->sync([]);
            $group->delete();
            $response_flag = 1;
        } catch (\ErrorException $e) {
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
}
