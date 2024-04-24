@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Payroll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">Payroll</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">View Payroll</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getPayroll->id}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Employee Name (employee id)<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{!empty($getPayroll->get_employee_name->name) ? $getPayroll->get_employee_name->name : ''}}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Number Of Day Work<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->number_of_day_work}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Bonus<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->bonus}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Overtime<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->overtime}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Gross Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->gross_salary}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Cash Advance<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->cash_advance}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Late Hours<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->late_hours}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Absent Days<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->absent_days}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">SSS Contribution<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->sss_contribution}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Philhealth<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->philhealth}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Total Deductions<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->total_deductions}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Payroll Monthly<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getPayroll->payroll_monthly}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Created At<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{date('d-m-y H:i A',strtotime($getPayroll->created_at))}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Updated At<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{date('d-m-y H:i A',strtotime($getPayroll->updated_at))}}
                                    </div>
                                </div>
                            </div>                            
                            <div class="card-footer">
                                
                                <a href="{{url('admin/payroll')}}" class="btn btn-default ">Back</a>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  </div>

  @endsection