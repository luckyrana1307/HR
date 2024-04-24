<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; // Add this line
use Illuminate\Http\Request;
use App\Models\DepartmentsModel;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\ManagerModel;
use App\Models\PositionModel;
use Illuminate\Support\Str;
use Illuminate\Support\file;
use Hash;
use Mail;
use App\Mail\EmployeesNewCreateMail;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }

    public function add(Request $request)
    {
        $data['getPosition'] = PositionModel::get();
        $data['departments'] = DepartmentsModel::get();
        $data['getManager'] = ManagerModel::get();
        $data['getJobs'] = JobsModel::get();
        return view('backend.employees.add',$data);
    }
    public function add_post(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "name" => "required",   
            "email" => "email|required|unique:users",
            "password"=> "required",
            "hire_date" => "required",
            "job_id" => "required",
            "salary" => "required",
            "commission_pct" => "required",
            "manager_id" => "required",
            "department_id" => "required",
            "position_id" => "required",
            
        ]);

        // Create a new user with the validated data
        $user = new User();
        $user->name = $validatedData['name'];
        $user->last_name          = trim($request->last_name);
        $user->email = $validatedData['email'];
       
        $user->phone_number          = trim($request->phone_number);
        $user->hire_date = $validatedData['hire_date'];
        $user->job_id = $validatedData['job_id'];
        $user->salary = $validatedData['salary'];
        $user->commission_pct = $validatedData['commission_pct'];
        $user->manager_id = $validatedData['manager_id'];
        $user->department_id = $validatedData['department_id'];
        $user->position_id = $validatedData['position_id'];
        $user->is_role =0;
        
        $randome_password = $request->password;

        if(!empty($request->password)){

            $user->password = Hash::make($request->password);
        }
        
        if (!empty($request->file('profile_image'))) {
            $file = $request->file('profile_image');
            $randomStr = str::random(30);
            $filename = $randomStr.'.'.$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $user->profile_image  = $filename;
        }
        $user->save();
        $user->randome_password = $randome_password;
        Mail::to($user->email)->send(new EmployeesNewCreateMail($user));

        // Return a response indicating success or failure
return redirect('admin/employees')->with('success','Register successfully');
    }


public function view($id){
    
    $data['departments'] = DepartmentsModel::get();
    $data['getManager'] = ManagerModel::get();
    $data['getRecord'] = User::find($id);
    return view('backend.employees.view',$data);
}
public function edit($id){
    $data['getPosition'] = PositionModel::get();
    $data['departments'] = DepartmentsModel::get();
    $data['getManager'] = ManagerModel::get();
    $data['getRecord'] = User::find($id);
    $data['getJobs'] = JobsModel::get();
    return view('backend.employees.edit',$data);
}

public function edit_update($id, Request $request) {
    // Validating the request data
    $user = request()->validate([
        "email" => "email|required|unique:users,email,".$id,
    ]);
    
    // Finding the user by ID
    $user = User::find($id);
    
    // Updating user details
    $user->name = trim($request->name);
    $user->last_name = trim($request->last_name);
    $user->email = trim($request->email);
    $user->password =Hash::make($request->password);
    $user->phone_number = trim($request->phone_number); // I assume this was intended
    $user->hire_date = trim($request->hire_date);
    $user->job_id = trim($request->job_id);
    $user->salary = trim($request->salary);
    $user->commission_pct = trim($request->commission_pct);
    $user->manager_id = trim($request->manager_id);
    $user->department_id = trim($request->department_id);
    $user->position_id = trim($request->position_id);
    $user->is_role = 0; // Assuming this is a boolean field
    $user->interview = $request->interview;
    
    if (!empty($request->file('profile_image'))) {

        if(!empty($user->profile_image) && file_exists('upload/'.$user->profile_image))
        {
            unlink('upload/'.$user->profile_image);
        }

        $file = $request->file('profile_image');
        $randomStr = str::random(30);
        $filename = $randomStr.'.'.$file->getClientOriginalExtension();
        $file->move('upload/',$filename);
        $user->profile_image  = $filename;
    }

    // Saving the updated user
    $user->save();

    // Redirecting back with a success message
    return redirect('admin/employees')->with('success', 'Updated successfully');
}

public function delete($id){
    $recordDelete = User::find($id);
    $recordDelete->delete();
    return redirect()->back()->with('error','Record Delete Successfully');
}
public function image_delete($id, Request $request){

    $deleteRecord = User::find($id);
    $deleteRecord->profile_image = $request->profile_image;
    $deleteRecord->save();
    return redirect()->back()->with('error','Record Image Successfully');
}


}
