<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegionsModel;
class RegionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRegions'] = RegionsModel::getRegions($request);
         return view('backend.regions.list',$data);
    }
    public function add(Request $request){
        return view('backend.regions.add');
    }

    public function add_post(Request $request){
        
        $validatedData = $request->validate([
            'regions_name' => 'required'
        ]);
        
        // Create a new JobgradeModel instance
        $regions = new RegionsModel;
        $regions->regions_name = $request->regions_name;
    
        // Save the job history to the database
        $regions->save();
    
        // Redirect with success message
        return redirect('admin/regions')->with('success', 'regions Successfully added');
    }
    
    public function edit($id ,Request $request){
          $data['getRegions'] = RegionsModel::find($id);
        return view('backend.regions.edit',$data);
    }
    public function edit_update($id ,Request $request){
        $regions = RegionsModel::find($id);
        
        $regions->regions_name = $request->regions_name;
    
        // Save the job history to the database
        $regions->save();
    
        // Redirect with success message
        return redirect('admin/regions')->with('success', 'regions update Successfully ');
    }
    public function delete($id ,Request $request){
        $regions = RegionsModel::find($id);
        $regions->delete();
        return redirect('admin/regions')->with('error', 'regions deleted Successfully ');
  
    }

}