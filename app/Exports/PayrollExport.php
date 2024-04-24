<?php
namespace App\Exports;

use App\Models\CountriesModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PayrollModel;

class PayrollExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
{
    $request = request()->all();
    return PayrollModel::getPayroll($request);
}

    protected $index = 0;

    public function map($user):array{
        $CreateAtFormat = date('d-m-y H:i A',strtotime($user->created_at));
        $UpdateAtFormat = date('d-m-y H:i A',strtotime($user->updated_at));
        return[
            ++$this->index,
            $user->id,
            $user->name,
            $user->number_of_day_work,
            $user->bonus,
            $user->overtime,
            $user->gross_salary,
            $user->cash_advance,
            $user->late_hours,
            $user->absent_days,
            $user->sss_contribution,
            $user->philhealth,
            $user->total_deductions,
            $user->netpay,
            $user->payroll_monthly,
            $CreateAtFormat,
            $UpdateAtFormat,

            
        ];
    }
    public function headings():array{
        return[
            'S.No',
            'Table Id',
            'Employee Name ',
            'Number Of Day Work',
            'Bonus',
            'Overtime',
            'Gross Salary',
            'Cash Advance',
            'Late Hours',
            'Absent Days',
            'SSS Contribution',
            'Philhealth',
            'Total Deductions',
            'Payroll Monthly',
            'Created At',
            'Updated At',
        ];
    }
}
