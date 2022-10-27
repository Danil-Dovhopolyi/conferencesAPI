<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Report::all();
        return response()->json([
            'status'=>true,
            'reports'=>$report
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $report = Report::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Conference created succesfully',
            'report'=>$report
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Report::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReportRequest $request, $id)
    {
      $report = Report::find($id);
      $report->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Conference updated succesfully',
            'report'=>$report
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::destroy($id);
        return response()->json([
            'message'=>'Conference deleted succesfully',
        ]);
    }
}
