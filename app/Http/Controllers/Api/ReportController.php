<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportList = Report::paginate(10);
        return response()->json([
            $reportList
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreReportRequest $request)
    {
        $report = $this->createReportByUser($request->all());
        
        return response()->json([
            'status'=>true,
            'message'=>'Report created succesfully',
            'report'=>$report
        ], 200);
    }
   private function createReportByUser($report) {
        $report['creator_id'] = Auth::user()->id;
        Report::create($report);
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
    public function search($topic = null)
    {
        if($topic == null){
            return Report::paginate(10);
        }
        $result = Report::where("topic", "like", "%" . $topic . "%")->paginate(10);
        if(count($result))
        {
            return $result;
        }
        else
        {
            return ['Result'=>'No records found'];
        }
    }
}
