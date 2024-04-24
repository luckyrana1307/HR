@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add </a></li>
              <li class="breadcrumb-item active">job History</li>
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
                            <h3 class="card-title">Add History</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/job_history/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Job Title <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name ="employee_id">
                                            <option value="">Select Employee Name</option>
                                            @foreach ($getEmployee as $value_employee)
                                                <option value="{{$value_employee->id}}">{{$value_employee->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Start Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date" class="form-control"  value="{{old('start_date')}}"  required>
                                        @if ($errors->has('start_date'))
                                        <span style="color:red">{{ $errors->first('start_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">End Date <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" class="form-control"  value="{{old('end_date')}}"   required>
                                        @if ($errors->has('end_date'))
                                        <span style="color:red">{{ $errors->first('end_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Job Name (Job Id) <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="job_id" >
                                            <option value="">Select Job Name</option>
                                            @foreach ($getJobs as $value_job)
                                                <option value="{{$value_job->id}}">{{$value_job->job_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Department Name (Department Id) <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name ="department_id">
                                            <option value="">Select Department</option>  
                                            @foreach ($departments as $value_d)
                                            <option value="{{$value_d->id}}">{{$value_d->department_name}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/job_history')}}" class="btn btn-default ">Back</a>
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