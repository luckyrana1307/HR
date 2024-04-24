<?php
namespace App\Exports;

use App\Models\CountriesModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CountriesExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
{
    $request = request()->all();
    return CountriesModel::getcountries($request);
}

    protected $index = 0;

    public function map($user):array{
        $CreateAtFormat = date('d-m-y H:i A',strtotime($user->created_at));
        $UpdateAtFormat = date('d-m-y H:i A',strtotime($user->updated_at));
        return[
            ++$this->index,
            $user->id,
            $user->country_name,
            $user->regions_name,
            $CreateAtFormat,
            $UpdateAtFormat
            
        ];
    }
    public function headings():array{
        return[
            'S.No',
            'Table Id',
            'Country Name',
            'Regions Name',
            'Created At',
            'Updated At'
        ];
    }
}
