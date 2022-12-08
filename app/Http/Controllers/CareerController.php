<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
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
            $careers = Career::join('schools', 'schools.id', "=", 'careers.school_id')
            ->select('careers.id', 'careers.name', 'careers.acronym', DB::raw('schools.name AS school_name'))
            ->where('careers.teacher_id', '=', $teacher_id)
            ->orderBy('careers.name')
            ->get();
            $result = $careers;
            $response_flag = 1;
        }
        catch (\ErrorException $e) {
            $response_flag = 2;
            $result = $e->getMessage();
            $trace = $e->getTrace();
        }
        catch (\Illuminate\Database\QueryException $e) {
            $response_flag = 2;
            $result = $e->errorInfo[2];
            $trace = $e->getTrace();
        }
        finally {
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
            $career = new Career($request->all());
            $career->save();
            $response_flag = 1;
        }
        catch (\ErrorException $e) {
            $response_flag = 2;
            $result = $e->getMessage();
            $trace = $e->getTrace();
        }
        catch (\Illuminate\Database\QueryException $e) {
            $response_flag = 2;
            $result = $e->errorInfo[2];
            $trace = $e->getTrace();
        }
        finally {
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
    public function show()
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
        $response_flag = 3;
        $result = null;
        $trace = null;
        try{
            $career = Career::find($id);
            $career->name = $request->name;
            $career->acronym = $request->acronym;
            $career->school_id = $request->school_id;
            $career->save();
            $response_flag = 1;
        }
        catch (\ErrorException $e) {
            $response_flag = 2;
            $result = $e->getMessage();
            $trace = $e->getTrace();
        }
        catch (\Illuminate\Database\QueryException $e) {
            $response_flag = 2;
            $result = $e->errorInfo[2];
            $trace = $e->getTrace();
        }
        finally {
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
        try{
            $career = Career::find($id);
            $career->delete();
            $response_flag = 1;
        }
        catch (\ErrorException $e) {
            $response_flag = 2;
            $result = $e->getMessage();
            $trace = $e->getTrace();
        }
        catch (\Illuminate\Database\QueryException $e) {
            $response_flag = 2;
            $result = $e->errorInfo[2];
            $trace = $e->getTrace();
        }
        finally {
            $data = [
                "response" => $result,
                "response_flag" => $response_flag,
                "trace" => $trace
            ];
            return response()->json($data, 200, [JSON_UNESCAPED_UNICODE]);
        }
    }
}
