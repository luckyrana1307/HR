@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payroll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add </a></li>
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
                            <h3 class="card-title">Add Payroll</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/payroll/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Employee Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name ="employee_id">
                                            <option value="">Select Employee Name</option>
                                            @foreach ($getRecord as $getE)
                                                <option value="{{$getE->id}}">{{$getE->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Number Of Day Work<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="number_of_day_work" class="form-control"  value="{{old('number_of_day_work')}}" placeholder="Number Of Day Work"  required>
                                        @if ($errors->has('number_of_day_work'))
                                        <span style="color:red">{{ $errors->first('number_of_day_work') }}</span>
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Bonus<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="bonus" class="form-control"  value="{{old('bonus')}}" placeholder="Enter Bonus"  required>
                                        @if ($errors->has('bonus'))
                                        <span style="color:red">{{ $errors->first('bonus') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Overtime<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="overtime" class="form-control"  value="{{old('overtime')}}" placeholder="Enter Overtime"  required>
                                        @if ($errors->has('overtime'))
                                        <span style="color:red">{{ $errors->first('overtime') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Gross Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="gross_salary" class="form-control"  value="{{old('gross_salary')}}" placeholder="Enter Gross Salary"  required>
                                        @if ($errors->has('gross_salary'))
                                        <span style="color:red">{{ $errors->first('gross_salary') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Cash Advance<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cash_advance" class="form-control"  value="{{old('cash_advance')}}" placeholder="Enter Cash Advance"  required>
                                        @if ($errors->has('cash_advance'))
                                        <span style="color:red">{{ $errors->first('cash_advance') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Late Hours<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="late_hours" class="form-control"  value="{{old('late_hours')}}" placeholder="Enter Late Hours"  required>
                                        @if ($errors->has('late_hours'))
                                        <span style="color:red">{{ $errors->first('late_hours') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Absent Days<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="absent_days" class="form-control"  value="{{old('absent_days')}}" placeholder="Enter Absent Days"  required>
                                        @if ($errors->has('absent_days'))
                                        <span style="color:red">{{ $errors->first('absent_days') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">SSS Contribution<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sss_contribution" class="form-control"  value="{{old('sss_contribution')}}" placeholder="Enter SSS Contribution"  required>
                                        @if ($errors->has('sss_contribution'))
                                        <span style="color:red">{{ $errors->first('sss_contribution') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Philhealth<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="philhealth" class="form-control"  value="{{old('philhealth')}}" placeholder="Enter Philhealth"  required>
                                        @if ($errors->has('philhealth'))
                                        <span style="color:red">{{ $errors->first('philhealth') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Total Deductions<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="total_deductions" class="form-control"  value="{{old('total_deductions')}}" placeholder="Enter Total Deductions"  required>
                                        @if ($errors->has('total_deductions'))
                                        <span style="color:red">{{ $errors->first('total_deductions') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Netpay<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="netpay" class="form-control"  value="{{old('netpay')}}" placeholder="Enter Netpay"  required>
                                        @if ($errors->has('netpay'))
                                        <span style="color:red">{{ $errors->first('netpay') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Payroll Monthly<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="payroll_monthly" class="form-control"  value="{{old('payroll_monthly')}}" placeholder="Enter Payroll Monthly"  required>
                                        @if ($errors->has('payroll_monthly'))
                                        <span style="color:red">{{ $errors->first('payroll_monthly') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/payroll')}}" class="btn btn-default ">Back</a>
                                <button type="submit" class="btn btn-primary float-right">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  </div>

  @endsection