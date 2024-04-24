<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationsModel;
use App\Models\CountriesModel;
use App\Exports\LocationsExport;
use Maatwebsite\Excel\Facades\Excel; // Add this line

class LocationsController extends Controller
{
    public function index(Request $request)
    {
         $data['getlocation'] = LocationsModel::getlocation($request);
         return view('backend.locations.list',$data);
    }
    public function add(Request $request){
        $data['getcountries'] = CountriesModel::get();
        return view('backend.locations.add',$data);
    }
    public function add_post(Request $request){
        $validatedData = $request->validate([
            "street_address" => "required",   
            "postal_code" => "required",
            "city"=> "required",
            "state_provice"=> "required",
            "countries_id"=> "required",
        ]);
        
        $Location = new LocationsModel();
        $Location->street_address = trim($request->street_address);
        $Location->postal_code = trim($request->postal_code);
        $Location->city = trim($request->city);
        $Location->state_provice = trim($request->state_provice);
        $Location->countries_id = trim($request->countries_id);
        
        $Location->save();

        return redirect('admin/locations')->with('success','locations successfully add');

    }

    public function edit($id){  
        $data['getlocation'] = LocationsModel ::find($id);
        $data['getcountries'] = CountriesModel::get();
        return view('backend.locations.edit',$data);
    }

    public function edit_update($id ,Request $request){
        $Location = LocationsModel::find($id);
        
        $Location->street_address = $request->street_address;
        $Location->postal_code = $request->postal_code;
        $Location->city = $request->city;
        $Location->state_provice = $request->state_provice;
        $Location->countries_id = $request->countries_id;
        
    
        // Save the job history to the database
        $Location->save();
    
        // Redirect with success message
        return redirect('admin/locations')->with('success', 'locations update Successfully ');
    }

    public function delete ($id ,Request $request){
        $Location = LocationsModel::find($id);
        $Location->delete();
        return redirect('admin/locations')->with('error', 'Location deleted Successfully ');
  
    }
    public function locations_export(Request $request){
        return Excel::download(new LocationsExport, 'locations.xlsx');
    }
}