<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PayrollModel;
use App\Exports\PayrollExport;
use Maatwebsite\Excel\Facades\Excel; // Add this line

class PayrollController extends Controller
{
    public function index(Request $request)
    {
      $data['getPayroll'] =  PayrollModel::getPayroll($request);
         return view('backend.payroll.list',$data);
    }
    public function add(Request $request){
        $data['getRecord'] = User::where('is_role','=',0)->get();
        return view('backend.payroll.add',$data);
    }
    public function insert_add(Request $request) {
        // Validate the incoming data
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'number_of_day_work' => 'required',
            'bonus' => 'required',
            'overtime' => 'required',
            'gross_salary' => 'required',
            'cash_advance' => 'required',
            'late_hours' => 'required',
            'absent_days' => 'required',
            'sss_contribution' => 'required',
            'philhealth' => 'required',
            'total_deductions' => 'required',
            'netpay' => 'required',
            'payroll_monthly' => 'required',
        ]);
    
        // Create a new PayrollModel instance
        $payroll = new PayrollModel;
        
        // Assign values from the validated data to the model properties
        $payroll->employee_id = $request->employee_id;
        $payroll->number_of_day_work = $request->number_of_day_work;
        $payroll->bonus = $request->bonus;
        $payroll->overtime = $request->overtime;
        $payroll->gross_salary = $request->gross_salary;
        $payroll->cash_advance = $request->cash_advance;
        $payroll->late_hours = $request->late_hours;
        $payroll->absent_days = $request->absent_days;
        $payroll->sss_contribution = $request->sss_contribution;
        $payroll->philhealth = $request->philhealth;
        $payroll->total_deductions = $request->total_deductions;
        $payroll->netpay = $request->netpay;
        $payroll->payroll_monthly = $request->payroll_monthly;
        
        // Save the payroll data to the database
        $payroll->save();
        
        // Redirect with success message
        return redirect('admin/payroll')->with('success', 'Payroll successfully added');
    }
        public function view($id, Request $request){

            $data['getPayroll'] =  PayrollModel::find($id);
            return view('backend.payroll.view',$data);
        }

        public function edit($id, Request $request)
        {
            $data['getRecord'] = User::where('is_role','=',0)->get();
            $data['getPayroll'] =  PayrollModel::find($id);
            return view('backend.payroll.edit',$data);
        }

        public function edit_update($id, Request $request){
             $payroll =  PayrollModel::find($id);

             
        $payroll->employee_id = $request->employee_id;
        $payroll->number_of_day_work = $request->number_of_day_work;
        $payroll->bonus = $request->bonus;
        $payroll->overtime = $request->overtime;
        $payroll->gross_salary = $request->gross_salary;
        $payroll->cash_advance = $request->cash_advance;
        $payroll->late_hours = $request->late_hours;
        $payroll->absent_days = $request->absent_days;
        $payroll->sss_contribution = $request->sss_contribution;
        $payroll->philhealth = $request->philhealth;
        $payroll->total_deductions = $request->total_deductions;
        $payroll->netpay = $request->netpay;
        $payroll->payroll_monthly = $request->payroll_monthly;
        
        // Save the payroll data to the database
        $payroll->save();
        
        // Redirect with success message
        return redirect('admin/payroll')->with('success', 'Payroll Updtaed successfully ');

        }

        public function delete($id ,Request $request){
            $payroll = PayrollModel::find($id);
            $payroll->delete();
            return redirect('admin/payroll')->with('error', 'Payroll deleted Successfully ');
      
        }
        public function payroll_export(Request $request) {
            return Excel::download(new PayrollExport,'Payroll.xlsx');
        }
        
    }