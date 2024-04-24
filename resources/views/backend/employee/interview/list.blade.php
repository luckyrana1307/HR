@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Interview </h1>  
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
            

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <section class="col-md-12">
            
            @include('message')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Interview List</h3>
                </div>
                <div class="card-body">
                  <table  class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Salary</th>
                          <th>Interview </th>
                          <th> Created At</th>
                          <th>Updated At</th>
                          
                        </tr>
                      </thead>
                        <tbody>
                            <tr>
                                <td>{{$getRecord->id}}</td>
                                <td>{{$getRecord->name}}</td>
                                <td>{{$getRecord->salary}}</td>
                                <td>
                                    @if ($getRecord->interview == '0')
                                  Cancel
                                @elseif($getRecord->interview == '1')
                                Pending
                                @elseif($getRecord->interview == '2')  
                                Completed
                                @endif
                                </td>
                                <td>{{date('d-m-y', strtotime($getRecord->created_at    ))}}</td>
                                <td>{{date('d-m-y', strtotime($getRecord->updated_at    ))}}</td>
                           
                            </tr>
                        </tbody>
                  </table>
                </div>
                {{-- {{ $getManager->appends(request()->except('page'))->links() }} --}}

              </div>
        </section>
    </div>
  </div>
</section>
</div>
@endsection