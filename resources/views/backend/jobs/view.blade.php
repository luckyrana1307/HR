@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">Jobs
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
                            <h3 class="card-title">View Jobs</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                            
                            <div class="card-body">
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->id}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Job Title<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->job_title}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Min Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->min_salary}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Max Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->max_salary}}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Created Date<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{date('d-m-y H:I: A',strtotime($getRecord->created_at))}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Updated Date<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{date('d-m-y H:I: A',strtotime($getRecord->updated_at))}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                
                                <a href="{{url('admin/jobs')}}" class="btn btn-default ">Back</a>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  </div>

  @endsection