<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;

class JobsController extends Controller
{
    // Display a list of jobs
    public function index(Request $request)
    {
        $data['getRecord'] = JobsModel::getRecord($request);
        return view('backend.jobs.list',$data);
    }

    // Show the form for creating a new job
    public function add()
    {
        return view('backend.jobs.add');
    }

    // Store a newly created job in the database
    public function add_post(Request $request)
    { 
        $validatedData = $request->validate([
            "job_title" => "required",   
            "min_salary" => "required",
            "max_salary"=> "required"
        ]);
        
        $job = new JobsModel();
        $job->job_title = $validatedData['job_title'];
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
        
        $job->save();

        return redirect('admin/jobs')->with('success','Job successfully registered');
    }

    // Display the specified job
    public function view($id, Request $request)
    {
        $data['getRecord'] = JobsModel::find($id);
        return view('backend.jobs.view',$data);
    }

    // Show the form for editing the specified job
    public function edit($id)
    {
        $data['getRecord'] = JobsModel::find($id);
        return view('backend.jobs.edit',$data);
    }

    // Update the specified job in the database
    public function edit_update($id, Request $request)
    {
        $validatedData = $request->validate([
            "job_title" => "required",   
            "min_salary" => "required",
            "max_salary"=> "required"
        ]);
        
        $job = JobsModel::find($id);
        $job->job_title = $validatedData['job_title'];
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
       
        $job->save();

        return redirect('admin/jobs')->with('success','Job updated successfully');
    }

    // Remove the specified job from the database
    public function delete($id)
    {
        $job = JobsModel::find($id);
        $job->delete();
        return redirect()->back()->with('error','Record deleted successfully');
    }

    // Export jobs to Excel
    public function jobs_export(Request $request)
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
        
    }
}
