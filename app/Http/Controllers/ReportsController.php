<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post')){
            $this->Store($request);
            return back()->withInput();
        }
        $reports = Report::all();
        return view('dashboard.reports.list',compact('reports'));
    }
    public function Store(Request $request){
        if(isset($request->ID)){
            $report        = Report::find($request->ID);
        }else{
            $report        = new Report();
        }
        $report->UID                         = $request->UID;
        $report->name                        = $request->name;
        $report->date                        = $request->date;
        $report->details                     = $request->details;
        $report->save();
    }
}
