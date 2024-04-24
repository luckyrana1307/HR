@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Position</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit </a></li>
              <li class="breadcrumb-item active">position</li>
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
                            <h3 class="card-title">Add Position</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/position/edit/'.$getPosition->id)}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Position Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="position_name" class="form-control"  value="{{$getPosition->position_name}}" placeholder="Enter Position Name"  required>
                                        @if ($errors->has('cash_advance'))
                                        <span style="color:red">{{ $errors->first('position_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Daily Rate<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="daily_rate" class="form-control"  value="{{$getPosition->daily_rate}}" placeholder="Enter Daily Rate"  required>
                                        @if ($errors->has('late_hours'))
                                        <span style="color:red">{{ $errors->first('daily_rate') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Monthly Rate<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="monthly_rate" class="form-control"  value="{{$getPosition->monthly_rate}}" placeholder="Enter Monthly Rate"  required>
                                        @if ($errors->has('monthly_rate'))
                                        <span style="color:red">{{ $errors->first('monthly_rate') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Working Days Per Month<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="working_days_per_month" class="form-control"  value="{{$getPosition->working_days_per_month}}" placeholder="Enter Working Days Per Month"  required>
                                        @if ($errors->has('working_days_per_month'))
                                        <span style="color:red">{{ $errors->first('working_days_per_month') }}</span>
                                        @endif
                                    </div>
                                </div>
                               

                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/position')}}" class="btn btn-default ">Back</a>
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