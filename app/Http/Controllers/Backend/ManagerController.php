<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationsModel;
use App\Models\ManagerModel;
use App\Exports\ManagerExport;
use Maatwebsite\Excel\Facades\Excel; // Add this line

class ManagerController extends Controller
{
    public function index(Request $request)
    {
     $data['getManager'] =  ManagerModel::getManager($request);
         return view('backend.manager.list',$data);
    }

    public function add(Request $request){
     
        return view('backend.manager.add');
    }
    public function add_post(Request $request){
        $validatedData = $request->validate([
            "manager_name" => "required",   
            "manager_email" => "required",
            "manager_mobile"=> "required",
        ]);
        
        $Manager = new ManagerModel();
        $Manager->manager_name = trim($request->manager_name);
        $Manager->manager_email = trim($request->manager_email);
        $Manager->manager_mobile = trim($request->manager_mobile);
        
        $Manager->save();

        return redirect('admin/manager')->with('success','Manager successfully add');

    }
    public function edit($id ,Request $request){
        
        $data['getManager'] = ManagerModel::find($id);
        return view('backend.manager.edit',$data);
    }
    public function edit_update($id ,Request $request){

        $Manager = ManagerModel::find($id);
        
        $Manager->manager_name = $request->manager_name;
        $Manager->manager_email = $request->manager_email;
        $Manager->manager_mobile = $request->manager_mobile;
        
        $Manager->save();
    
        // Redirect with success message
        return redirect('admin/manager')->with('success', 'Manager update Successfully ');
    }

    public function delete($id ,Request $request){
        $regions = ManagerModel::find($id);
        $regions->delete();
        return redirect('admin/manager')->with('error', 'Manager deleted Successfully ');
  
    }
    public function manager_export(Request $request){
        return Excel::download(new ManagerExport, 'Manager.xlsx');
    }
    
}