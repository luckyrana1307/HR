@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                            <h3 class="card-title">Add Employees</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/employees/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">First Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control"  value="{{old('name')}}"  placeholder="Enter First Name" required>
                                        @if ($errors->has('name'))
                                        <span style="color:red">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Last Name </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="last_name" class="form-control"  value="{{old('last_name')}}"  placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Email ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control"  value="{{old('email')}}"  placeholder="Enter Email ID" required>
                                        @if ($errors->has('email'))
                                            <span style="color:red">{{ $errors->first('email') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Password<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control"  value="{{old('password')}}"  placeholder="Enter Password" required>
                                        @if ($errors->has('password'))
                                            <span style="color:red">{{ $errors->first('password') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Phone Number </label>
                                    <div class="col-sm-10">
                                        <input type="number" name="phone_number" class="form-control"  value="{{old('phone_number')}}"  placeholder="Enter Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_image" class="form-control"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Hire Date <span style="color: red" >*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="hire_date" class="form-control"  value="{{old('hire_date')}}"  placeholder="Enter Date" required>
                                        @if ($errors->has('hire_date'))
                                        <span style="color:red">{{ $errors->first('hire_date') }}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for=""> Job ID <span style="color: red" >*</span></label>
                                    <div class="col-sm-10">
                                       <select name="job_id" class="form-control" required>
                                            <option value="">Select Job Title</option>
                                                    @foreach ($getJobs as $value_job)
                                                    <option value="{{$value_job->id}}">{{$value_job->job_title}}</option>
                                                @endforeach
                                        </select>
                                        @if ($errors->has('job_id'))
                                        <span style="color:red">{{ $errors->first('job_id') }}</span>
                                         @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Salary <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="salary" class="form-control"  value="{{old('salary')}}"  placeholder="Enter Salary" required>
                                        @if ($errors->has('salary'))
                                        <span style="color:red">{{ $errors->first('salary') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Commisson PCT <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="commission_pct" class="form-control" required  value="{{old('commission_pct')}}"  placeholder="Enter Commission PCT">
                                        @if ($errors->has('commission_pct'))
                                        <span style="color:red">{{ $errors->first('commission_pct') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for=""> Manager Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="manager_id" class="form-control" required>
                                            <option value="">Select Manager Name</option>
                                        @foreach ($getManager as $value_m)
                                                <option value="{{$value_m->id}}">{{$value_m->manager_name}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('manager_id'))
                                        <span style="color:red">{{ $errors->first('manager_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for=""> Department Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       <select name="department_id" class="form-control" required>
                                            <option value="">Select Department Name</option>
                                            @foreach ($departments as $value_d)
                                            <option value="{{$value_d->id}}">{{$value_d->department_name}}</option>
                                             @endforeach
                                        </select>
                                        @if ($errors->has('department_id'))
                                        <span style="color:red">{{ $errors->first('department_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for=""> Position Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       <select name="position_id" class="form-control" required>
                                            <option value="">Select Position Name</option>
                                            @foreach ($getPosition as $value_p)
                                            <option value="{{$value_p->id}}">{{$value_p->position_name}}</option>
                                             @endforeach
                                        </select>
                                        @if ($errors->has('department_id'))
                                        <span style="color:red">{{ $errors->first('department_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Password <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" r   equired value="{{old('')}}"  placeholder="Enter Password">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-footer">
                                
                                <a href="{{url('admin/employees')}}" class="btn btn-default ">Back</a>
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