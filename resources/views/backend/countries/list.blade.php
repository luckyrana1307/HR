@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Countries</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">  
            <form action="{{url('admin/countries_export')}}" method="get">
              <input type="hidden" name="start_date" id="" value="{{Request()->start_date}}">
              <input type="hidden" name="end_date" id="" value="{{Request()->end_date}}">
              <a href="{{url('admin/countries_export?start_date='.Request()->start_date.'&end_date='.Request()->end_date)}}" class="btn btn-success">Excel Export</a>
            </form>  
            <br>   
            <a href="{{url('admin/countries/add')}}" class="btn btn-primary">Add Countries</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
   
  <!-- /.content-wrapper -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-md-12">


              {{-- search box --}}
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Search Countries List</h3>
                </div>
                <form action="">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="">ID</label>
                        <input type="text" name="id" class="form-control" value="{{Request()->id}}" placeholder="ID">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Country Name</label>
                        <input type="text" name="country_name" value="{{Request()->country_name}}"  class="form-control" placeholder="Country Name">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Regions Name</label>
                        <input type="text" name="regions_name" value="{{Request()->regions_name}}"  class="form-control" placeholder="Regions Name">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">From Date (Start Date)</label>
                        <input type="date" name="start_date" value="{{Request()->start_date}}"  class="form-control" >
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">To Date (End Date)</label>
                        <input type="date" name="end_date" value="{{Request()->end_date}}"  class="form-control" >
                      </div>
                      <div class="form-group col-md-2">
                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                        <a href="{{url('admin/countries')}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                      </div>
                      
                    </div>
                  </div>
                </form>
              </div>

                @include('message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Countries List</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Country Name</th>
                                    <th>Regions Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($getcountries as $value)
                              <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->country_name}}</td>
                                <td>{{!empty($value->get_regions_name->regions_name)?$value->get_regions_name->regions_name : ''}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>
                                  <a href="{{url('admin/countries/edit/'.$value->id)}}" class="btn btn-primary"> Edit</a>
                                  <a href="{{url('admin/countries/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                            
                                </td>
                              </tr>
                                  
                              @empty
                                  <tr>
                                    <td colspan="100%">
                                        No Record Found.
                                    </td>
                                  </tr>
                              @endforelse
                            </tbody>
                        </table>
                        <div style="padding:10px;float:right;"> 
                          {{ $getcountries->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
  </section>
  </div>
  
@endsection
