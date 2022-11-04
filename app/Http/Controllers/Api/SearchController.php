<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conference;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
     public function searchConference($title = null)
    {
        if($title == null){
            return Conference::paginate(10);
        }
        $result = Conference::where("title", "like", "%" . $title . "%")->paginate(10);
        if(count($result))
        {
            return $result;
        }
        else
        {
            return ['Result'=>'No records found'];
        }
    }
    public function searchReport($topic = null)
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
       public function range()
    {
      $from = '2021-11-17 18:38:13';
      $to = '2021-12-17 15:19:00';
    return  $query = Conference::whereBetween('date', [$from, $to])->get();
    
    
    }
}
