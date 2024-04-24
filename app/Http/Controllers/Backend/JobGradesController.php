<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobGradesModel;
class JobGradesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobGradesModel::getRecord($request);
        return view('backend.job_grades.list',$data);
    }
    public function add(Request $request)
    {
        return view('backend.job_grades.add');
    }
    public function add_post(Request $request){
        
        $validatedData = $request->validate([
            'grade_level' => 'required',
            'lowest_sal' => 'required',
            'highest_sal' => 'required',
        ]);
        
        // Create a new JobgradeModel instance
        $jobgrade = new JobGradesModel;
        $jobgrade->grade_level = $request->grade_level;
        $jobgrade->lowest_sal = $request->lowest_sal;
        $jobgrade->highest_sal = $request->highest_sal;
    
        // Save the job history to the database
        $jobgrade->save();
    
        // Redirect with success message
        return redirect('admin/job_grades')->with('success', 'Job Grade Successfully added');
    }
    public function edit($id)
    {
        $data['getRecord'] = JobGradesModel::find($id);
        return view('backend.job_grades.edit',$data);
    }

    public function edit_update($id, Request $request){
        $jobgrade =  JobGradesModel::find($id);
        $jobgrade->grade_level = $request->grade_level;
        $jobgrade->lowest_sal = $request->lowest_sal;
        $jobgrade->highest_sal = $request->highest_sal;
    
        // Save the job history to the database
        $jobgrade->save();
    
        // Redirect with success message
        return redirect('admin/job_grades')->with('success', 'Job Grade updated Successfully ');


    }
    public function delete($id){
        $jobgrade =  JobGradesModel::find($id);
        $jobgrade->delete();
        return redirect('admin/job_grades')->with('error', 'Job Grade deleted Successfully ');

    }
}