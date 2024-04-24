<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Request;
class PositionModel extends Model
{
    use HasFactory;

    protected $table = 'position';

    public static function getPosition($request): LengthAwarePaginator
    {
        $return = self::select('position.*')->orderBy('position.id','desc');
        
        
        // Search filter
        
        if (!empty(Request::get('id'))) 
        {
            $return = $return->where('id','=',Request::get('id'));
        }
        if (!empty(Request::get('position_name'))) 
        {
            $return = $return->where('position_name','like','%'.Request::get('position_name').'%');
        }
        if (!empty(Request::get('daily_rate'))) 
        {
            $return = $return->where('daily_rate','like','%'.Request::get('daily_rate').'%');
        }
        if (!empty(Request::get('monthly_rate'))) 
        {
            $return = $return->where('monthly_rate','like','%'.Request::get('monthly_rate').'%');
        }
        if (!empty(Request::get('working_days_per_month'))) 
        {
            $return = $return->where('working_days_per_month','like','%'.Request::get('working_days_per_month').'%');
        }


        $return = $return->paginate(20 );
        return $return;
    }
}