@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Countries</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add </a></li>
              <li class="breadcrumb-item active">Countries</li>
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
                            <h3 class="card-title">Add Countries</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/countries/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Country Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="country_name" class="form-control" placeholder="Country Name"  value="{{old('country_name')}}"  required>
                                        @if ($errors->has('country_name'))
                                        <span style="color:red">{{ $errors->first('country_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Regions Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select name="regions_id" id="" class="form-control" required> 
                                            <option value="">Select Regions Name</option>
                                            @foreach ($getRegions as $value)
                                            <option value="{{$value->id}}"  required>{{$value->regions_name}}</option>
                                            @endforeach
                                            
                                        </select>
                                        @if ($errors->has('regions_id'))
                                        <span style="color:red">{{ $errors->first('regions_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/countries')}}" class="btn btn-default ">Back</a>
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