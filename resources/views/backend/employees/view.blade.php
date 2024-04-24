@extends('backend.layouts.app')
 
@section('content')
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">View</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
                            <h3 class="card-title">View Employees</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                            
                            <div class="card-body">
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->id}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">First Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->name}}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Last Name<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->last_name}}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Email<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->email}}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Phone Number<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->phone_number}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Profile Image<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        @if (!empty( $getRecord->profile_image))  
                                
                                        @if (file_exists('upload/' . $getRecord->profile_image))  
                                            <img src="{{ url('upload/' . $getRecord->profile_image) }}" alt="" style="height: 80px; width: 80px;">
                                          @endif
                                       
                                          @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Hire Date<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{date('d-m-y',strtotime($getRecord->hire_date))}}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Job ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{!empty($getRecord->get_job_single->job_title) ? $getRecord->get_job_single->job_title : ''}}
                                   
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Salary<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->salary}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Commission Pct<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{$getRecord->commission_pct}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Manager ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{!empty($getRecord->get_manager_name_single->manager_name) ? $getRecord->get_manager_name_single->manager_name : ''}}
                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Department ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       
                                       {{!empty($getRecord->get_department_name_single->department_name) ? $getRecord->get_department_name_single->department_name : ''}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Position ID<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       
                                       {{!empty($getRecord->get_postion_name_single->position_name) ? $getRecord->get_postion_name_single->position_name : ''}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Role<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{!empty($getRecord->is_role)?'HR':'Employee'}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Interview<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        @if ($getRecord->interview == '0')
                                        Cancel
                                      @elseif($getRecord->interview == '1')
                                      Pending
                                      @elseif($getRecord->interview == '2')  
                                      Completed
                                      @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Created Date<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{date('d-m-y H:I: A',strtotime($getRecord->created_at))}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Updated Date<span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                       {{date('d-m-y H:I: A',strtotime($getRecord->updated_at))}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                
                                <a href="{{url('admin/employees')}}" class="btn btn-default ">Back</a>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  </div>

  @endsection