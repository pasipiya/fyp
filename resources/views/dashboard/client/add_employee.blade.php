@extends('dashboard.layouts.dashboardApp')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Employee</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                Add Employee
              </button>
            </div>
            <!-- /.col-md-6 -->
          </div>


        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


          <!-- Alert Section -->
          @if(session('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session('success')}}
          </div>
          @endif
          @if(session('delete'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session('delete')}}
          </div>
          @endif
          <!-- End Alert Section -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

 
          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">

                <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                <div class="card">
                    <div class="card-body">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Department</th>
                            <th>Join Date</th>
                            <th>Address</th>
                            <th>Manager</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; ?>
                          @foreach($employee as $row)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$row['name']}}</td>
                            <td>{{$row['emp_image']}}</td>
                            <td>{{$row['code']}}</td>
                            <td>{{$row['department']}}</td>
                            <td>{{$row['join_date']}}</td>
                            <td>{{$row['address']}}</td>
                            <td>{{$row['manager']}}</td>
                            <td>
                              @if($row['employee_status']==0)
                              <span class="badge badge-danger">Deactive</span>
                              @endif
                              @if($row['employee_status']==1)
                              <span class="badge badge-success">Active</span>
                              @endif
        
                            </td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          
                          
                                  @if($row['department_status']==0)
                                  <a class="dropdown-item" href="{{url('/active_employee/'.$row["_id"] )}}">Active</a>
                                  @endif
                                  @if($row['department_status']==1)
                                  <a class="dropdown-item" href="{{url('/deactive_employee/'.$row["_id"] )}}">Deactive</a>
                                  @endif
                                  <a class="dropdown-item" href="{{url('/edit_employee/'.$row["_id"] )}}">Edit </a>
                                  <a class="dropdown-item" href="{{url('/delete_employee/'.$row["_id"] )}}">Delete </a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->




    <!-- modal -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- form start -->
                <form method="POST" action="{{url('submit_employee')}}">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                        <label>Employee Name:</label>
                        <input type="text" name="employee_name" class="form-control" placeholder="Enter Employee Name" required="">
                    </div>
                    <div class="form-group">
                      <label>Employee Code:</label>
                      <input type="text" name="employee_code" class="form-control" placeholder="Enter Employee Code" required="">
                  </div>
                  <div class="form-group">
                    <label>Department</label>
                    <select required class="form-control" id="gender" name="department">
                      <option selected disabled >Select Department</option>
                      @foreach ($departments as $item)
                    <option value="">{{$item["department_name"]}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Join Date</label>
                    <div class="input-group date" id="join_date" data-target-input="nearest">
                      <input type="text" name="join_date" class="form-control datetimepicker-input"
                        data-target="#join_date" placeholder="Join Date" />
                      <div class="input-group-append" data-target="#join_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Employee Address:</label>
                    <input type="text" name="employee_address" class="form-control" placeholder="Enter Employee Address" required="">
                </div>
                <div class="form-group">
                  <label>Manager:</label>
                  <input type="text" name="manager" class="form-control" placeholder="Enter Manager" required="">
                </div>
                <div class="form-group">
                  <label >Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" multiple="" name="image" class="custom-file-input" >
                      <label class="custom-file-label">Upload Image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">Upload</span>
                    </div>
                  </div>
                </div>
  
                  </div>
                  <!-- /.card-body -->
  
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  
  
  






    </div>
    <!-- /.content-wrapper -->

    @endsection
    @push('scripts')

 <script>
     $('#join_date').datetimepicker({
    format: 'YYYY-MM-DD'
  });
   </script>
    @endpush