@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 >Employees</h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{url('admin/employees/add')}}" class="btn btn-primary">Add Employee</a>
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
                     <h3 class ="card-title"> Search Employees</h3>
                  </div>
                     <form method="get" action=""> 
                        <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-1">
                                <label>ID</label>
                                <input type="text" name="id" value="{{Request()->id}}" class="form-control" placeholder="Id">
                            </div>
                              <div class="form-group col-md-3">
                                  <label>First Name</label>
                                  <input type="text" name="name" value="{{Request()->name}}" class="form-control" placeholder="First Name">
                              </div>
                              <div class="form-group col-md-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" value="{{Request()->last_name}}" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-3">
                              <label>Email</label>
                              <input type="text" name="email" value="{{Request()->email}}" class="form-control" placeholder="Email Id">
                          </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                <a href="{{url("admin/employees")}}" class="btn btn-success" style="margin-top: 30px">Reset</a>
                          </div>
                            </div>
                        </div>
                     </form>
                
                </div>
                @include('message') 
                <div class="card">
                  <div class="card-header">
                      <h3 class="card-title"> Employee List</h3>
                  </div>
                  <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Profile Image</th>
                            <th>Is Role</th>
                            <th>Interview</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($getRecord as $value)
                          <tr>
                              <td>{{$value->id}}</td>
                              <td>{{$value->name}}</td>
                              <td>{{$value->last_name}}</td>
                              <td>{{$value->email}}</td>
                              <td>
                                @if (!empty( $value->profile_image))  
                                
                                @if (file_exists('upload/' . $value->profile_image))  
                                    <img src="{{ url('upload/' . $value->profile_image) }}" alt="" style="height: 80px; width: 80px;">
                                  @endif
                               <a href="{{url('admin/employees/image_delete/'.$value->id)}}"
                                onclick="return confirm('Are you sure that you want to delete this record ?')" class="btn btn-danger">
                              <span class="fa fa-trash"></span>
                              </a>
                                  @endif
                              </td>
                              <td>{{ !empty($value->is_role) ? 'HR' : 'Employees' }}</td>
                              <td>
                                @if ($value->interview == '0')
                                  Cancel
                                @elseif($value->interview == '1')
                                Pending
                                @elseif($value->interview == '2')  
                                Completed
                                @endif
                              </td>
                              <td>
                                <a href="{{ url('admin/employees/view/' . $value->id) }}" class="btn btn-info">View</a>
                                <a href="{{ url('admin/employees/edit/' . $value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/employees/delete/' .$value->id)}}" onclick="return confirm('Are you sure you want to delete ?')" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="100%">No Record Found</td>
                          </tr>
                              
                          @endforelse
                          </tbody>
                          </table>
                          <div style="padding:10px; float: right;">
                              {{ $getRecord->appends(request()->except('page'))->links() }}
                          </div>
                          
                          
                      </div>
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
  