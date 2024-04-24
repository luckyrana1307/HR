<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Request;
use App\Models\ManagerModel;
use Laravel\Sanctum\HasApiTokens;
use App\Models\DepartmentsModel;
use App\Models\PositionModel;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'commission_pct',
        'manager_id',
        'department_id',
        'is_role',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static function getRecord(): LengthAwarePaginator
    {
        $return = self::select('users.*');
    
        if (!empty(Request::get('id'))) 
        {
            $return = $return->where('id','=',Request::get('id'));
        }
        if (!empty(Request::get('name'))) 
        {
            $return = $return->where('name','like','%'.Request::get('name').'%');
        }
        if (!empty(Request::get('last_name'))) 
        {
            $return = $return->where('last_name','like','%'.Request::get('last_name').'%');
        }
        if (!empty(Request::get('email'))) 
        {
            $return = $return->where('email','like','%'.Request::get('email').'%');
        }
        

    
        // Removed extra "->" here
        $return = $return->orderBy('id', 'desc')->paginate(20);
        return $return;
    }

    public function get_job_single(){
        return $this->belongsTo(JobsModel::class, "job_id");
    }
    public function get_manager_name_single(){
        return $this->belongsTo(ManagerModel::class, "manager_id");
    }
    public function get_department_name_single(){
        return $this->belongsTo(DepartmentsModel::class, "department_id");
    }
    public function get_postion_name_single(){
        return $this->belongsTo(PositionModel::class, "position_id");
    }
    
}
