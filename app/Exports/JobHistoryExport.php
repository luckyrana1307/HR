<?php
namespace App\Exports;

use App\Models\JobHistoryModel;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class JobHistoryExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection(){
        $request = Request::all();
        return JobHistoryModel::getRecord($request);
    }

    protected $index = 0;
    
    public function map($user):array{
        $startDate = date('d-m-y',strtotime($user->start_date));
        $endDate = date('d-m-y',strtotime($user->end_date));
        $cretedAtFormat = date('d-m-y H:i A',strtotime($user->created_at));
        // if ($user->department_id == 1) {
        //     $department = 'Developer Department';
        // }
        // else{
        //     $department = 'BDM Department';
        // }
        
        return [
            $user->id,
            $user->name.' '.$user->last_name,
            $startDate,
            $endDate,
            $user->job_title,
            $user->department_name,
            $cretedAtFormat
        ];
    }
    public function headings():array{
        return[
            'Table ID',
            'Employee Name',
            'Start Date',
            'End Date',
            'Job Title',
            'Department ',
            'Creted At'
        ] ;
    }
}
