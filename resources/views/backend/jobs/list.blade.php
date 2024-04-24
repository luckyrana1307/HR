@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jobs</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">       
            <form action="{{url('admin/jobs_export')}}" method="GET">
              <input type="hidden" name="start_date" value="{{Request()->start_date}}">
              <input type="hidden" name="end_date" value="{{Request()->end_date}}">
              <a class="btn btn-success" href="{{url('admin/jobs_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date'))}}">Excel Export</a>
            </form>
            <br>
            <a href="{{url('admin/jobs/add')}}" class="btn btn-primary">Add Jobs</a>
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
                       <h3 class ="card-title">Search Jobs</h3>
                    </div>
                       <form method="get" action=""> 
                          <div class="card-body">
                              <div class="row">
                                <div class="form-group col-md-3">
                                  <label>ID</label>
                                  <input type="text" name="id" value="{{Request()->id}}" class="form-control" placeholder="Id">
                              </div>
                                <div class="form-group col-md-3">
                                    <label>Job Title</label>
                                    <input type="text" name="job_title" value="{{Request()->job_title}}" class="form-control" placeholder="Job Title">
                                </div>
                                <div class="form-group col-md-3">
                                  <label>Min Salary</label>
                                  <input type="text" name="min_salary" value="{{Request()->min_salary}}" class="form-control" placeholder="Min Salary">
                              </div>  
                              <div class="form-group col-md-3">
                                <label>Max Salary</label>
                                <input type="text" name="max_salary" value="{{Request()->max_salary}}" class="form-control" placeholder="Max Salary">
                            </div>
                            <div class="form-group col-md-3">
                              <label>From Date (Start Date)</label>
                              <input type="date" name="start_date" value="{{Request()->start_date}}" class="form-control">
                            </div>
                          <div class="form-group col-md-3">
                            <label>To Date (End Date)</label>
                            <input type="date" name="end_date" value="{{Request()->end_date}}" class="form-control">
                          </div>
                              <div class="form-group col-md-2">
                                  <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                  <a href="{{url("admin/jobs")}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                            </div>
                              </div>
                          </div>
                       </form>
                  
                  </div>
                  @include('message') 
                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Jobs List</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Job Title</th>
                              <th>Min Salary</th>
                              <th>Max Salary</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($getRecord as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->job_title}}</td>
                                <td>{{$value->min_salary}}</td>
                                <td>{{$value->max_salary}}</td>
                              <td>{{date('d-m-y H:i A',strtotime($value->updated_at))}}</td>
                                <td>
                                  <a href="{{url('admin/jobs/view/'.$value->id)}}" class="btn btn-info">View</a>
                                  <a href="{{url('admin/jobs/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                  <a href="{{url('admin/jobs/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="6">No Record Found</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                        <div style="padding:10px; float: right;"></div>
                    </div>
                  </div>
                </section>
            </div>
        </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
