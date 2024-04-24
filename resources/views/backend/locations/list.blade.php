@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Locations </h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
              <form action="{{url('admin/locations_export')}}" method="get">
                <input type="hidden" name="start_date" value="{{Request()->start_date}}">
                <input type="hidden" name="end_date" value="{{Request()->end_date}}">
                <a href="{{url('admin/locations_export?start_date='.Request()->start_date.'&end_date='.Request()->end_date)}}" class="btn btn-success"> Excel Export</a>
              </form>
              <br>
            <a href="{{url('admin/locations/add')}}" class="btn btn-primary">Add Locations</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <section class="col-md-12">
            
            {{-- Search Start --}}
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Location</h3>
              </div>
              <form action="" method="get">
                  <div class="card-body">
                    <div class="row">
                        <div class="from-group col-md-1">
                          <label for="">ID</label>
                          <input type="text" name='id' class="form-control" value="{{Request()->id}}" placeholder="ID">
                        </div>
                        <div class="from-group col-md-3">
                          <label for="">Street Address</label>
                          <input type="text" name='street_address' class="form-control" value="{{Request()->street_address}}" placeholder="Street Address">
                        </div>
                        <div class="from-group col-md-2">
                          <label for="">Postal Code</label>
                          <input type="text" name='postal_code' class="form-control" value="{{Request()->postal_code}}" placeholder="Postal Code">
                        </div>
                        <div class="from-group col-md-3">
                          <label for="">City</label>
                          <input type="text" name='city' class="form-control" value="{{Request()->city}}" placeholder="City">
                        </div>
                        <div class="from-group col-md-3">
                          <label for="">State Provice</label>
                          <input type="text" name='state_provice' class="form-control" value="{{Request()->state_provice}}" placeholder="State Provice">
                        </div>
                        <div class="from-group col-md-3">
                          <label for="">countries Name</label>
                          <input type="text" name='country_name' class="form-control" value="{{Request()->country_name}}" placeholder="countries Name">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="">Created At</label>
                          <input type="date" name="created_at" value="{{Request()->created_at}}"  class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                          <label for="">Updated At</label>
                          <input type="date" name="updated_at" value="{{Request()->updated_at}}"  class="form-control" >
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
                          <a href="{{url('admin/locations')}}" class="btn btn-success" style="margin-top:30px;">Reset</a>
                        </div>
                    </div>
                  </div>
              </form>
            </div>

            {{-- End Start --}}

            @include('message')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">locations List</h3>
                </div>
                <div class="card-body">
                  <table  class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Street Address</th>
                          <th>Postal Code</th>
                          <th>City</th>
                          <th>State Provice</th>
                          <th>Countries Name</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($getlocation as $value)
                            <tr>
                              <td>{{$value->id}}</td>
                              <td>{{$value->street_address}}</td>
                              <td>{{$value->postal_code}}</td>
                              <td>{{$value->city  }}</td>
                              <td>{{$value->state_provice}}</td>
                              <td>{{$value->country_name}} / {{$value->countries_id}}</td>
                              <td>{{date('d-m-y H:i A',strtotime($value->created_at))}}</td>
                              <td>{{date('d-m-y H:i A',strtotime($value->updated_at))}}</td>
                              <td>
                                <a href="{{url('admin/locations/edit/'.$value->id)}}" class="btn btn-primary"> Edit</a>
                                <a href="{{url('admin/locations/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                          
                              </td>
                            </tr>
                        @empty
                            <tr>
                              <td colspan="100%">No Record Found.</td>
                            </tr>
                        @endforelse
                      </tbody>
                  </table>
                </div>
                {{ $getlocation->appends(request()->except('page'))->links() }}

              </div>
        </section>
    </div>
  </div>
</section>
</div>
@endsection