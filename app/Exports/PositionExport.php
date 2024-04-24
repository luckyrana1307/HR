<?php
namespace App\Exports;

use App\Models\CountriesModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PositionModel;

class PositionExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
{
    $request = request()->all();
    return PositionModel::getPosition($request);
}

    protected $index = 0;

    public function map($user):array{
        $CreateAtFormat = date('d-m-y H:i A',strtotime($user->created_at));
        $UpdateAtFormat = date('d-m-y H:i A',strtotime($user->updated_at));
        return[
            ++$this->index,
            $user->id,
            $user->position_name,
            $user->daily_rate,
            $user->monthly_rate,
            $user->working_days_per_month,
            $CreateAtFormat,
            $UpdateAtFormat,

            
        ];
    }
    public function headings():array{
        return[
            'S.No',
            'Table Id',
            'Position Name ',
            'Daily Rate',
            'Monthly Rate',
            'Working Days Per Month',
            'Created At',
            'Updated At',
        ];
    }
}
