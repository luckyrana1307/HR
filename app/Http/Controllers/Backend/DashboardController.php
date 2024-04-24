<?php

namespace App\Http\Controllers\Backend; // Ensure correct namespace

use App\Http\Controllers\Controller; // Add this line
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\JobHistoryModel;
use App\Models\RegionsModel;
use App\Models\CountriesModel;
use App\Models\LocationsModel;
use App\Models\DepartmentsModel;
use App\Models\ManagerModel;
use App\Models\PayrollModel;
use App\Models\PositionModel;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if(Auth::User()->is_role == 1){

        
        $data['getRecord'] = User::count();
        $data['HRCount'] = User::Where('is_role','=',1)->count();
        $data['EMPCount'] = User::Where('is_role','=',0)->count();
        $data['getJob'] = JobsModel::count();
        $data['getJobHistory'] = JobHistoryModel::count();
        $data['getRegions'] = RegionsModel::count();
        $data['gettodayRegions'] = RegionsModel::WhereDate('created_at',Carbon::today())->count();
        $data['YesterdayRegions'] = RegionsModel::WhereDate('created_at',Carbon::yesterday())->count();
        $data['getCountries'] = CountriesModel::count();
        $data['getLocations'] = LocationsModel::count();
        $data['getDepartments'] = DepartmentsModel::count();
        $data['getManager'] = ManagerModel::count();
        $data['getPayroll'] = PayrollModel::count();
        $data['getPosition'] = PositionModel::count();
        return view('backend.dashboard.list',$data);
        }
        
        elseif (Auth::user()->is_role == 0) {
            return view('backend.employee.dashboard.list');
        }
    }
}
