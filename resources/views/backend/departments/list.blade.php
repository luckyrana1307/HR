@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departments</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <form action="{{url('admin/departments_export')}}" method="get">
                <input type="hidden" name="start_date" value="{{Request()->start_date}}">
                <input type="hidden" name="end_date" value="{{Request()->end_date}}">
                <a href="{{url('admin/departments_export?start_date='.Request()->start_date.'&end_date='.Request()->end_date)}}" class="btn btn-success">Excel Export</a>
            </form>
            <br>
              <a href="{{url('admin/departments/add')}}" class="btn btn-primary">Add Departments</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <section class="col-md-12">
            {{-- Search box Start --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Departments</h3>
                    </div>
                    <form method="get" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">ID</label>
                                    <input type="text" name="id" class="form-control" value="{{Request()->id}}" placeholder="ID">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Department Name</label>
                                    <input type="text" name="department_name" class="form-control" value="{{Request()->department_name}}" placeholder="Department Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Locations</label>
                                    <input type="text" name="street_address" class="form-control" value="{{Request()->street_address}}" placeholder="Locations">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="">From Date(Start Date)</label>
                                  <input type="date" name="start_date" class="form-control" value="{{Request()->start_date}}" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="">To Date(End Date)</label>
                                <input type="date" name="end_date" class="form-control" value="{{Request()->end_date}}" >
                            </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-primary" style = "margin-top:30px;" type="submit">Submit</button>
                                    <a href="{{url('admin/departments')}}" style = "margin-top:30px;" class="btn btn-success">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Search box End --}}
              @include('message')
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Departments List</h3>
                  </div>
                  <div class="card-body">
                    <table  class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Department Name </th>
                            <th>Manager Name</th>
                            <th>Locations</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @forelse ($getdepartment as $value)
                            <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ $value->department_name }}</td>
                              <td>
                                    @if ($value->manager_id == 1    )
                                        Lucky     
                                @else
                                        Roy     
                                    @endif
                            </td>
                            
                              <td>{{ $value->street_address }}</td>
                              <td>{{ date('d-m-y H:i A', strtotime($value->created_at)) }}</td>
                              <td>
                                <a href="{{url('admin/departments/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/departments/delete/'.$value->id)}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-danger">Delete</a>
                             
                              </td>
                            </tr>
                            @empty
                               <tr>
                                <td colspan="100%">No Record Found.</td>  
                              </tr>   
                            @endforelse 
                        </tbody>
                    </table>
                    <div style="padding:10px;float:right;"> 
                        {{ $getdepartment->appends(request()->except('page'))->links() }}
                      </div>
                  </div>
                </div>
          </section>
      </div>
    </div>
  </section>
  </div>
  @endsection