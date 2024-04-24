<?php
namespace App\Exports;

use App\Models\CountriesModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\ManagerModel;

class ManagerExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
{
    $request = request()->all();
    return ManagerModel::getManager($request);
}

    protected $index = 0;

    public function map($user):array{
        $CreateAtFormat = date('d-m-y H:i A',strtotime($user->created_at));
        $UpdateAtFormat = date('d-m-y H:i A',strtotime($user->updated_at));
        return[
            ++$this->index,
            $user->id,
            $user->manager_name,
            $user->manager_email,
            $user->manager_mobile,
            $CreateAtFormat,
            $UpdateAtFormat,

            
        ];
    }
    public function headings():array{
        return[
            'S.No',
            'Table Id',
            'Manger Name',
            'Manger Email',
            'Manger Phone',
            'Created At',
            'Updated At',
        ];
    }
}
