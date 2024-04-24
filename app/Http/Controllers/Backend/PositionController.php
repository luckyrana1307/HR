<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PositionModel;
use App\Exports\PositionExport;
use Maatwebsite\Excel\Facades\Excel; // Add this line

class PositionController extends Controller
{
    public function index(Request $request)
    {
     $data['getPosition'] =  PositionModel::getPosition($request);
         return view('backend.position.list',$data);
    }

    public function add(Request $request){
        
        return view('backend.position.add');
    }
    public function insert_add(Request $request) {
        $validatedData = $request->validate([
            'position_name' => 'required',
            'daily_rate' => 'required',
            'monthly_rate' => 'required',
            'working_days_per_month' => 'required',
        ]);
        
        // Create a new JobHistoryModel instance
        $Position = new PositionModel;
        $Position->position_name = $request->position_name;
        $Position->daily_rate = $request->daily_rate;
        $Position->monthly_rate = $request->monthly_rate;
        $Position->working_days_per_month = $request->working_days_per_month;
        
        // Save the job history to the database
        $Position->save();
    
        // Redirect with success message
        return redirect('admin/position')->with('success', 'Position ADD Successfully ');
    }
    public function edit($id, Request $request){

        $data['getPosition'] = PositionModel::find($id);
        return view('backend.position.edit',$data);

    }
    public function edit_update($id, Request $request){
        $Position  = PositionModel::find($id);

        $Position->position_name = $request->position_name;
        $Position->daily_rate = $request->daily_rate;
        $Position->monthly_rate = $request->monthly_rate;
        $Position->working_days_per_month = $request->working_days_per_month;
        
        // Save the job history to the database
        $Position->save();
    
        // Redirect with success message
        return redirect('admin/position')->with('success', 'Position Updated  Successfully ');

    }
    public function delete($id, Request $request){
        $Position  = PositionModel::find($id);
        $Position->delete();

        return redirect('admin/position')->with('error', 'Position Deleted Successfully ');
    }
    public function position_export( Request $request){

        return Excel::download(new PositionExport,'Position.xlsx');
        
    }
}