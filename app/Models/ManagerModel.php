<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Request;
class ManagerModel extends Model
{
    use HasFactory;

    protected $table = 'manager';

    static public function getManager($request){
        
        $return = self::select('manager.*')->orderBy('manager.id','desc');

        if (!empty(Request::get('id'))) 
        {
            $return = $return->where('id','=',Request::get('id'));
        }
        if (!empty(Request::get('manager_name'))) 
        {
            $return = $return->where('manager_name','like','%'.Request::get('manager_name').'%');
        }
        if (!empty(Request::get('manager_email'))) 
        {
            $return = $return->where('manager_email','like','%'.Request::get('manager_email').'%');
        }
        if (!empty(Request::get('manager_mobile'))) 
        {
            $return = $return->where('manager_mobile','like','%'.Request::get('manager_mobile').'%');
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('manager.created_at', '>=', Request::get('start_date'))
                             ->where('manager.created_at', '<=', Request::get('end_date'));
        }

        $return = $return->paginate(20);

        return $return;
    }
}