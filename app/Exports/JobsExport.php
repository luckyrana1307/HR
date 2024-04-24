<?php
namespace App\Exports;

use App\Models\JobsModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    protected $requestData;
    protected $index = 0;
    public function export(Request $request)
{
    $requestData = $request->all();
    return new JobsExport($requestData);
}

    public function collection()
    {
        return JobsModel::getRecord($this->requestData);
    }

    public function map($user): array
    {
        return [
            ++$this->index,
            $user->job_title,
            $user->min_salary,
            $user->max_salary,
            $user->created_at   

        ];
    }

    public function headings(): array
    {
        return [
            'S.No', 
            'Job Title',
            'Min Salary',
            'Max Salary',
            'Created At',
        ];
    }
}
