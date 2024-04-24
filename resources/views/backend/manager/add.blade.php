@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add</a></li>
              <li class="breadcrumb-item active">Manager</li>
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
                            <h3 class="card-title">Add Manager</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/manager/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Manager Name <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="manager_name" class="form-control"  value="{{old('manager_name')}}"  placeholder="Manager Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-sm-2 col-form-label" for="">Manager Email <span style="color: red">*</span></label>
                                  <div class="col-sm-10">
                                      <input type="email" name="manager_email" class="form-control"  value="{{old('manager_email')}}"  placeholder="Manager Email" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="">Manager Mobile <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" name="manager_mobile" class="form-control"  value="{{old('manager_mobile')}}"  placeholder="Manager Mobile" required>
                                </div>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/manager')}}" class="btn btn-default ">Back</a>
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