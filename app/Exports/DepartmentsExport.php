<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\DepartmentsModel;

class DepartmentsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        // Create a new instance of Request using the request data
        $requestData = request()->all();
        $request = new Request($requestData);

        // Pass the Request object to the getdepartment method
        return DepartmentsModel::getdepartment($request);
    }

    protected $index = 0;

    public function map($user): array
    {
        if ($user->manager_id == 1) {
           $manger_id = "Lucky";
        }
        else{
            $manger_id = "Roy";
        }

        $CreateAtFormat = date('d-m-y H:i A', strtotime($user->created_at));
        $UpdateAtFormat = date('d-m-y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->department_name,
            $manger_id,
            $user->street_address,
            $CreateAtFormat,
            // Add mappings for other properties as needed
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table Id',
            'Department Name',
            'Manager Name',
            'Locations',
            'Created At',
            // Add headings for other properties as needed
        ];
    }
}
