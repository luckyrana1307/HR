<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Request;
class LocationsModel extends Model
{
    use HasFactory;

    protected $table = 'locations';

     static public function getlocation($request)
    {
        $return = self::select('locations.*','countries.country_name')
        ->join('countries','countries.id', '=','locations.countries_id')->orderBy('id','desc');
        
        //search start
        
        if (!empty(Request::get('id'))) 
        {
            $return = $return->where('id','=',Request::get('id'));
        }
        if (!empty(Request::get('street_address'))) 
        {
            $return = $return->where('street_address','like','%'.Request::get('street_address').'%');
        }
        if (!empty(Request::get('postal_code'))) 
        {
            $return = $return->where('postal_code','like','%'.Request::get('postal_code').'%');
        }
        if (!empty(Request::get('city'))) 
        {
            $return = $return->where('city','like','%'.Request::get('city').'%');
        }
        if (!empty(Request::get('country_name'))) 
        {
            $return = $return->where('country_name','like','%'.Request::get('country_name').'%');
        }
        if(!empty(Request::get('created_at')))
        {
            $return = $return->where('locations.created_at','like', '%'.Request::get('created_at').'%');
        }
        if(!empty(Request::get('updated_at')))
        {
            $return = $return->where('locations.updated_at','like', '%'.Request::get('updated_at').'%');
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('locations.created_at', '>=', Request::get('start_date'))
                             ->where('locations.created_at', '<=', Request::get('end_date'));
        }


        
       


        $return = $return->paginate(20);

        return $return; 
    }

}