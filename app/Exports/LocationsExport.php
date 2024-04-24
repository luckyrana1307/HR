<?php
namespace App\Exports;

use App\Models\CountriesModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\LocationsModel;

class LocationsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
{
    $request = request()->all();
    return LocationsModel::getlocation($request);
}

    protected $index = 0;

    public function map($user):array{
        $CreateAtFormat = date('d-m-y H:i A',strtotime($user->created_at));
        $UpdateAtFormat = date('d-m-y H:i A',strtotime($user->updated_at));
        return[
            ++$this->index,
            $user->id,
            $user->street_address,
            $user->postal_code,
            $user->city,
            $user->state_provice,
            $user->countries_name,
            $user->created_at,
            $user->updated_at,
            
        ];
    }
    public function headings():array{
        return[
            'S.No',
            'Table Id',
            'Street Address',
            'Postal Code',
            'City',
            'State Provice',
            'Countries Name',
            'Created At',
            'Updated At'
        ];
    }
}
