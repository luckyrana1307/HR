@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payroll</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
             <a href="{{ url('admin/payroll_export') }}" class="btn btn-success">Excel Export</a>
            
              <a href="{{url('admin/payroll/add')}}" class="btn btn-primary">Add Payroll</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <section class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search PayRoll List</h3>
              </div>
              <form action="" method="get">
                <div class="card-body"> 
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="">ID</label>
                      <input type="text" name="id" class="form-control" placeholder="Enter ID">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Employee Name </label>
                      <input type="text" name="employee_id" class="form-control" value="{{Request()->employee_id}}" placeholder="Enter Employee Name ">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Number Of Day Work </label>
                      <input type="text" name="number_of_day_work" class="form-control" value="{{Request()->number_of_day_work}}" placeholder="Enter ID">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Bonus </label>
                      <input type="text" name="bonus" class="form-control" value="{{Request()->bonus}}" placeholder="Enter Bonus">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Overtime </label>
                      <input type="text" name="overtime" class="form-control" value="{{Request()->overtime}}" placeholder="Enter Overtime">
                    </div>
                    <div class="form-group col-md-2">
                        <button style="margin-top: 31px" class="btn btn-primary" type="submit">Search</button>
                        <a href="{{url('admin/payroll')}}" class="btn btn-success" style="margin-top: 31px">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
              @include('message')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Payroll List</h3>
                  </div>
                  <div class="card-body">
                    <table  class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Employee Name (employee id)</th>
                            <th>Number Of Day Work</th>
                            <th>Bonus</th>
                            <th>Overtime</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $totalBonus = 0;
                              $totalNumberOfDayWork=0;
                              $totalOvertime = 0;
                          @endphp
                            @forelse ($getPayroll as $value)
                            @php
                                 $totalBonus = $totalBonus + $value->bonus;
                                 $totalNumberOfDayWork = $totalNumberOfDayWork + $value->number_of_day_work;
                                 $totalOvertime = $totalOvertime + $value->overtime;
                            @endphp
                                <tr>
                                  <td>{{$value->id}}</td>
                                  <td>{{!empty($value->name) ? $value->name : ''}}</td>
                                  <td>{{$value->number_of_day_work}}</td>
                                  <td>{{$value->bonus}}</td>
                                  <td>{{$value->overtime}}</td>
                                  <td>
                                    <a href="{{url('admin/payroll/view/'.$value->id)}}" class="btn btn-info">View</a>
                                    <a href="{{url('admin/payroll/edit/'.$value->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('admin/payroll/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                                 
                                  </td>
                                </tr>
                            @empty
                            <tr>
                              <td colspan="100%">No Record Found</td>
                            </tr>
                            @endforelse
                            <tr>
                              <th colspan="2">Total All</th>
                              <td>{{$totalNumberOfDayWork}}</td>
                              <td>{{$totalBonus}}</td>
                              <td>{{$totalOvertime}}</td>
                            </tr>
                          
                        </tbody>
                    </table>
                  </div>
                  {{ $getPayroll->appends(request()->except('page'))->links() }}

                </div>
          </section>
      </div>
    </div>
  </section>
  </div>
  @endsection