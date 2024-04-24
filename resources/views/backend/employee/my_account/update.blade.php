@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Account </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Setting</a></li>
              <li class="breadcrumb-item active">My Account </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('message')
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">My Account </h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('employee/my_account/update')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for=""> Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control"  value="{{$getRecord->name}}"  placeholder=" Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-2 col-form-label" for="">
                                 Email <span style="color: red">*</span></label>
                                  <div class="col-sm-10">
                                      <input type="email" name="email" class="form-control"  value="{{$getRecord->email }}"  placeholder=" Email" required>
                                      @if ($errors->has('email'))
                                      <span style="color:red">{{ $errors->first('email') }}</span>
                                      @endif
                                    </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for=""> Profile Image <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile_image" class="form-control"   placeholder=" Email" required>
                                      @if (!empty($getRecord->profile_image))
                                       @if (file_exists('upload/' . $getRecord->profile_image))
                                         
                                        <img src="{{url('upload/'.$getRecord->profile_image)}}" alt="" style="width: 60px;hight:60px">
                                     
                                        @endif
                                       @endif
                                  </div>
                            </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for=""> Password<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="password" class="form-control"  value=""  placeholder= "Password" >
                                (Leave  blank if you are not changing the password)
                                </div>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('employee/my_account')}}" class="btn btn-default ">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  </div>

  @endsection