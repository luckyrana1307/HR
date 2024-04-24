@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Departments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Departments</li>
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
                            <h3 class="card-title">Add Departments</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/departments/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Department Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="department_name" class="form-control"  value="{{old('department_name')}}"  placeholder="Department Name" required>
                                        @if ($errors->has('department_name'))
                                        <span style="color:red">{{ $errors->first('department_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Manager Name<br> (Manager ID)<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="manager_id" id="">
                                            <option value="">Select Manager Name</option>
                                            <option value="1">Lucky</option>
                                            <option value="2">Roy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Locations Name <br>(Locations ID)<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="locations_id" id="">
                                            @foreach ($getlocation as $value)
                                            <option value="{{$value->id}}"  required>{{$value->street_address}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/departments')}}" class="btn btn-default ">Back</a>
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