<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConferenceRequest;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferenceList = Conference::paginate(10);
        return response()->json([
            $conferenceList
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConferenceRequest $request)
    {
        $conference = $this->createConferenceByUser($request->all());
        
        return response()->json([
            'status'=>true,
            'message'=>'Conference created succesfully',
            'conference'=>$conference
        ], 200);
    }
    
    private function createConferenceByUser($conference) {
        $conference['creator_id'] = Auth::user()->id;
        Conference::create($conference);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Conference::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConferenceRequest $request, $id)
    {
      $conference = Conference::find($id);
      $conference->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Conference updated succesfully',
            'conference'=>$conference
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
        $conference = Conference::destroy($id);
        return response()->json([
            'message'=>'Conference deleted succesfully',
        ]);
    }
  
    
}
