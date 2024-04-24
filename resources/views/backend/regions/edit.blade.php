@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Regions </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit </a></li>
              <li class="breadcrumb-item active">Regions</li>
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
                            <h3 class="card-title">Edit regions</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/regions/edit/'.$getRegions->id)}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Regions Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="regions_name" class="form-control" placeholder="Regions Name"  value="{{$getRegions->regions_name}}"  required>
                                        @if ($errors->has('regions_name'))
                                        <span style="color:red">{{ $errors->first('regions_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/regions')}}" class="btn btn-default ">Back</a>
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