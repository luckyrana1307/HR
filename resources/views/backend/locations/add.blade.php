@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Locations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add </a></li>
              <li class="breadcrumb-item active">Locations</li>
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
                            <h3 class="card-title">Add Locations</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/locations/add')}}">
                            {{ csrf_field() }}  
                            

                            <div class="card-body">
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Street Address<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="street_address" class="form-control"  value="{{old('street_address')}}" placeholder="Street Address"  required>
                                        @if ($errors->has('street_address'))
                                        <span style="color:red">{{ $errors->first('street_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Postal Code<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="postal_code" class="form-control"  value="{{old('postal_code')}}" placeholder="Postal Code"  required>
                                        @if ($errors->has('postal_code'))
                                        <span style="color:red">{{ $errors->first('postal_code') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">City<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city" class="form-control"  value="{{old('city')}}" placeholder="City"  required>
                                        @if ($errors->has('city'))
                                        <span style="color:red">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">State Provice<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="state_provice" class="form-control"  value="{{old('state_provice')}}" placeholder="Postal Code"  required>
                                        @if ($errors->has('state_provice'))
                                        <span style="color:red">{{ $errors->first('state_provice') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Countries Name (Countries Id) <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name ="countries_id" required>
                                            <option value="">Countries Name</option>
                                            @foreach ($getcountries as $value)
                                            <option value="{{$value->id}}">{{$value->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('admin/locations')}}" class="btn btn-default ">Back</a>
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