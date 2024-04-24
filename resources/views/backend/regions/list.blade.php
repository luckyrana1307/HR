@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Regions </h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">

            <a href="{{url('admin/regions/add')}}" class="btn btn-primary">Add Regions</a>
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
                  <h3 class="card-title">Search Regions</h3>
              </div>
              <form action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="">ID</label>
                      <input type="text" name="id" class="form-control" value="{{Request()->id}}" placeholder="ID">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="">Regions Name</label>
                      <input type="text" name="regions_name" class="form-control" value="{{Request()->regions_name}}" placeholder="Regions Name">
                    </div>

                    <div class="form-group col-md-2">
                      <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                      <a href="{{url('admin/regions')}}" class="btn btn-success" style="margin-top:30px">Reset</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            @include('message')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Regions List</h3>
                </div>
                <div class="card-body">
                  <table  class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Regions Name</th>
                          <th> Created At</th>
                          <th> Updated At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($getRegions as $value)
                            <tr>
                              <td>{{$value->id}}</td>
                              <td>{{$value->regions_name}}</td>

                              <td>{{date('d-m-y H:i A',strtotime($value->created_at))}}</td>
                              <td>{{date('d-m-y H:i A',strtotime($value->updated_at))}}</td>
                              <td>
                                <a href="{{url('admin/regions/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('admin/regions/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
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
                {{-- {{!! $getRecord->appends(Illuminate\Support\Facades\$request->except('page'))->links() !!}} --}}
                {{ $getRegions->appends(request()->except('page'))->links() }}

              </div>
        </section>
    </div>
  </div>
</section>
</div>
@endsection