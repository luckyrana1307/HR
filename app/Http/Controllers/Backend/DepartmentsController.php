<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentsModel;
use App\Models\LocationsModel;
use App\Exports\DepartmentsExport;
use Maatwebsite\Excel\Facades\Excel; // Add this line

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {

         $data['getdepartment'] = DepartmentsModel::getdepartment($request);
         return view('backend.departments.list',$data);
    }
    public function add(Request $request){
        $data['getlocation'] = LocationsModel::get();
        return view('backend.departments.add',$data);
    }
    public function add_post(Request $request){

        $Department = $request->validate([
            'department_name' => 'required',
            'manager_id' => 'required',
            'locations_id' => 'required',
        ]);
        
        // Create a new JobgradeModel instance
        $Department = new DepartmentsModel;
        $Department->department_name = $request->department_name;
        $Department->manager_id = $request->manager_id;
        $Department->locations_id = $request->locations_id;
        
    
        // Save the job history to the database
        $Department->save();
    
        // Redirect with success message
        return redirect('admin/departments')->with('success', 'Departments Successfully added');

    }
    public function edit($id){
        $data['getdepartment'] = DepartmentsModel::find($id);
        $data['getlocation'] = LocationsModel::get();
        return view('backend.departments.edit',$data);

    }
    public function edit_update($id, Request $request){

        $Department =  DepartmentsModel::find($id);
        $Department->department_name = $request->department_name;
        $Department->manager_id = $request->manager_id;
        $Department->locations_id = $request->locations_id;
    
        // Save the job history to the database
        $Department->save();
    
        // Redirect with success message
        return redirect('admin/departments')->with('success', 'departments updated Successfully ');


    }
    public function delete($id){
        $Department = DepartmentsModel::find($id);
        $Department->delete();
        return redirect()->back()->with('error','Record Delete Successfully');
    }

    public function departments_export(Request $request){
        return Excel::download(new DepartmentsExport, 'departments.xlsx');
    }
}