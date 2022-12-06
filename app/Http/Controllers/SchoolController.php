<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
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
            $schools = School::where('teacher_id', '=', $teacher_id)->get();
            $result = $schools;
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
            $school = new School($request->all());
            $school->save();
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
            $school = School::find($id);
            $school->name = $request->name;
            $school->save();
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
            $school = School::find($id);
            $school->delete();
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
