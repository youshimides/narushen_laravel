<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $sort =  $request->input('sort');
        if($sort== 'asc' || $sort =='desc'){
            $reports = Report::orderBy('created_at',$sort)
            ->paginate(8);
        } else{
            $reports = Report::paginate(8);
        }
        $status = $request->input('status');
        $validate= $request->validate([
            'status'=>"exists:statuses,id"
        ]);
        if($validate){
            $reports = Report::where('status_id',$status)
            ->paginate(8);
        }else{
            $reports = Report::paginate(8);
        }

        $statuses = Status::all();
        return view('report.index',compact('reports','statuses','sort','status'));
    }
    public function destroy(Report $report)
    {
        $report -> delete();
        return redirect()->back();
    }
    public function create(){
        return view('report.create');
    }

    public function store(Request $request, Report $report){

        $data = $request->validate([
            'number' => 'required',
            'description' => 'required',
        ]);
        
        $report::create($data);
        
        
        return redirect()->route('report.index');
    }

    public function edit(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
    $data = $request->validate([
        'number' => 'required',
        'description' => 'required',
    ]);
    
    $report->update($data);
    
    return redirect()->route('report.index');
    }

}
