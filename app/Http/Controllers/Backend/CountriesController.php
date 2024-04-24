<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountriesModel;
use App\Models\RegionsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountriesExport;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $data['getcountries'] = CountriesModel::getcountries($request);
         return view('backend.countries.list',$data);
    }
    public function add(Request $request){
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.add',$data);
    }
    public function add_post(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            "country_name" => "required",   
            "regions_id" => "required",
        ]);
    
        // Create a new instance of CountriesModel
        $countries = new CountriesModel();
        
        // Assign the validated data to the model instance
        $countries->country_name = $validatedData['country_name'];
        $countries->regions_id = $validatedData['regions_id'];
    
        // Save the new post
        $countries->save();
    
        // Redirect with success message
        return redirect('admin/countries')->with('success', 'Country added successfully');
    }
    public function edit($id){
        $data['getcountries'] = CountriesModel::find($id);
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.edit',$data);
    }
    public function edit_update($id ,Request $request){
        $countries = CountriesModel::find($id);
        $countries->country_name = $request->country_name;
        $countries->regions_id = $request->regions_id;

        
        $countries->save();
    
        // Redirect with success message
        return redirect('admin/countries')->with('success', 'Country updated successfully');


    }

    public function delete($id ,Request $request){
        $countries = CountriesModel::find($id);  
        $countries->delete(); 
        return redirect('admin/countries')->with('error', 'Country deleted successfully');
    }
    public function countries_export(Request $request){
        return Excel::download(new CountriesExport, 'countries.xlsx');
    }
}