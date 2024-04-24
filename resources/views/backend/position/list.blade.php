@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Position</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/position_export') }}" class="btn btn-success">Excel Export</a>
            
              <a href="{{url('admin/position/add')}}" class="btn btn-primary">Add Position</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <section class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Search Manger</h3>
                </div>
                <form action="">
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="">ID</label>
                        <input type="text" name="id" class="form-control" value="{{Request()->id}}" placeholder="ID">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Position Name</label>
                        <input type="text" name="position_name" class="form-control" value="{{Request()->position_name}}" placeholder="Position Name">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Daily Rate</label>
                        <input type="text" name="daily_rate" class="form-control" value="{{Request()->daily_rate}}" placeholder="Daily Rate">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Monthly Rate</label>
                        <input type="text" name="monthly_rate" class="form-control" value="{{Request()->monthly_rate}}" placeholder="Monthly Rate">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="">Working Days Per Month</label>
                        <input type="text" name="working_days_per_month" class="form-control" value="{{Request()->working_days_per_month}}" placeholder="Working Days Per Month">
                      </div>
                      
                      <div class="form-group col-md-2">
                        <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                        <a href="{{url('admin/position')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              @include('message')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Position List</h3>
                  </div>
                  <div class="card-body">
                    <table  class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Position Name </th>
                            <th>Daily Rate</th>
                            <th>Monthly Rate</th>
                            <th>Working Days Per Month</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($getPosition as $value)
                              <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->position_name}}</td>
                                <td>{{$value->daily_rate}}</td>
                                <td>{{$value->monthly_rate}}</td>
                                <td>{{$value->working_days_per_month}}</td>
                                <td>{{date('d-m-y H:i A',strtotime($value->created_at))}}</td>
                                <td>{{date('d-m-y H:i A',strtotime($value->updated_at))}}</td>
                                <td>
                                  <a href="{{url('admin/position/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                  <a href="{{url('admin/position/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a> 
                                </td>
                              </tr>
                          @empty
                          <tr>
                            <td colspan="100%">No Record Found</td>
                          </tr>
                          @endforelse
                        </tbody>
                    </table>
                  </div>
                   {{ $getPosition->appends(request()->except('page'))->links() }} 

                </div>
          </section>
      </div>
    </div>
  </section>
  </div>
  @endsection