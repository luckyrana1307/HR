@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job Grades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add </a></li>
              <li class="breadcrumb-item active">job Grades</li>
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
                            <h3 class="card-title">Add Grades</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/job_grades/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Grade Level<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="grade_level" class="form-control" placeholder="Grade Level"  value="{{old('grade_level')}}"  required>
                                        @if ($errors->has('grade_level'))
                                        <span style="color:red">{{ $errors->first('grade_level') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Lowest Sal<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="lowest_sal" class="form-control" placeholder="Lowest Sal"  value="{{old('lowest_sal')}}"  required>
                                        @if ($errors->has('lowest_sal'))
                                        <span style="color:red">{{ $errors->first('lowest_sal') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Highest Sal<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="highest_sal" class="form-control" placeholder="Highest Sal"  value="{{old('highest_sal')}}"  required>
                                        @if ($errors->has('highest_sal'))
                                        <span style="color:red">{{ $errors->first('highest_sal') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/job_grades')}}" class="btn btn-default ">Back</a>
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