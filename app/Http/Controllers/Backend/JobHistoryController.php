<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use Illuminate\Database\QueryException;
use App\Models\JobHistoryModel;
use App\Exports\JobHistoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DepartmentsModel;

class JobHistoryController extends Controller
{
    // Display a list of jobs
    public function index(Request $request)
    {
        $data['getRecord'] = JobHistoryModel::getRecord($request);
        
        return view('backend.job_history.list',$data);
    }
    public function job_history_export(Request $request){
        return Excel::download(new JobHistoryExport, 'job_history.xlsx');

    }
    public function add()
    {   $data['departments'] = DepartmentsModel::get();
        $data['getEmployee'] = User::where('is_role','=',0)->get();
        $data['getJobs'] = JobsModel::get();
        return view('backend.job_history.add',$data);
    }
    public function add_post(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required'
        ]);
        
        // Create a new JobHistoryModel instance
        $jobHistory = new JobHistoryModel;
        $jobHistory->employee_id = $request->employee_id;
        $jobHistory->start_date = $request->start_date;
        $jobHistory->end_date = $request->end_date;
        $jobHistory->job_id = $request->job_id;
        $jobHistory->department_id = $request->department_id;
    
        // Save the job history to the database
        $jobHistory->save();
    
        // Redirect with success message
        return redirect('admin/job_history')->with('success', 'Job History Successfully added');
    }
    public function edit($id){
        $data['getEmployee'] = User::where('is_role','=',0)->get();
        $data['getJobs'] = JobsModel::get();
        $data['departments'] = DepartmentsModel::get();
        $data['getRecord'] = JobHistoryModel::find($id);
        return view('backend.job_history.edit',$data);
    }
    
    public function edit_update($id, Request $request){
        $jobHistory = JobHistoryModel::find($id);
        $jobHistory->employee_id = $request->employee_id;
        $jobHistory->start_date = $request->start_date;
        $jobHistory->end_date = $request->end_date;
        $jobHistory->job_id = $request->job_id;
        $jobHistory->department_id = $request->department_id;

        $jobHistory->save();
    
        // Redirect with success message
        return redirect('admin/job_history')->with('success', 'Job History updated Successfully ');
    
    }
    public function delete($id){
        $jobHistory = JobHistoryModel::find($id);
        $jobHistory->delete();
        return redirect('admin/job_history')->with('error', 'Job History Delete Successfully added');
    
    }
}