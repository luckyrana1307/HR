<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Request;
class RegionsModel extends Model
{
    use HasFactory;

    protected $table = 'regions';

    static public function getRegions($request){
        $return = self::select('regions.*')->orderBy('regions.id','desc');
        //search box start

        if (!empty(Request::get('id'))) 
        {
            $return = $return->where('id','=',Request::get('id'));
        }
        if (!empty(Request::get('regions_name'))) 
        {
            $return = $return->where('regions_name','like','%'.Request::get('regions_name').'%');
        }

        //search box end
        $return = $return->paginate(20);
        return $return;
    }
}