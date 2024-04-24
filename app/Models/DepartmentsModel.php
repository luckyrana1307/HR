<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DepartmentsModel extends Model
{
    use HasFactory;

    protected $table = 'departments';

    public static function getdepartment(Request $request)
    {
        $return = self::select('departments.*', 'locations.street_address')
            ->join('locations', 'locations.id', '=', 'departments.locations_id')
            ->orderBy('departments.id', 'desc');
    
        // Search
        if (!empty($request->get('id'))) {
            // $query->where('departments.id', '=', $request->get('id')); // Specify departments.id
            $return = $return->where('departments.id','=',Request::get('id'));
        }
    
        if (!empty($request->get('department_name'))) {
            // $query->where('department_name', 'like', '%' . $request->get('department_name') . '%');
            $return = $return->where('departments.department_name','like','%'.Request::get('department_name').'%');
        }
    
        if (!empty($request->get('manager_id'))) {
            // $query->where('manager_id', 'like', '%' . $request->get('manager_id') . '%');
            $return = $return->where('departments.manager_id','like','%'.Request::get('manager_id').'%');
        }
    
        if (!empty($request->get('street_address'))) {
            // $query->where('locations.street_address', 'like', '%' . $request->get('street_address') . '%');
            $return = $return->where('locations.street_address','like','%'.Request::get('street_address').'%');
        }
    
        if(!empty($request->get('created_at')))
        {
            $return = $return->where('departments.created_at','like', '%'.Request::get('created_at').'%');
        }
        if(!empty($request->get('updated_at')))
        {
            $return = $return->where('departments.updated_at','like', '%'.Request::get('updated_at').'%');
        }
        
        if (!empty($request->get('start_date')) && !empty($request->get('end_date'))) {
            $return = $return->where('departments.created_at', '>=', $request->get('start_date'))
                             ->where('departments.created_at', '<=', $request->get('end_date'));
        }
        
        
        
        $results = $return->paginate(20);
        
        return $results;
    }
    
}
