@extends('dashboard.layouts.dashboardApp')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div id="app" class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Department</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                Add Depatment
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
                            <th>Department Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=1; ?>
                          @foreach($department as $row)
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$row['department_name']}}</td>
                            <td>
                              @if($row['department_status']==0)
                              <span class="badge badge-danger">Deactive</span>
                              @endif
                              @if($row['department_status']==1)
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
                                  <a class="dropdown-item" href="{{url('/active_department/'.$row["_id"] )}}">Active</a>
                                  @endif
                                  @if($row['department_status']==1)
                                  <a class="dropdown-item" href="{{url('/deactive_department/'.$row["_id"] )}}">Deactive</a>
                                  @endif
                                  <a class="dropdown-item" href="{{url('/edit_department/'.$row["_id"] )}}">Edit </a>
                                  <a class="dropdown-item" href="{{url('/delete_department/'.$row["_id"] )}}">Delete </a>
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





            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                  <!-- Main row -->
                  <div class="row">
                    <div class="col-md-12">

                        <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                        <div class="card">
                            <div class="card-body">
                              <department>
                              </department>
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
              <h4 class="modal-title">Add Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- form start -->
                <form method="POST" action="{{url('submit_department')}}">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                        <label>Department Name:</label>
                        <input v-model='content' type="text" id="department_name" name="department_name" class="form-control" placeholder="Enter Department Name" required="">
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href=""><span class="btn btn-primary" @click.prevent='submitDepartment'>Submit</span></a>
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
        export default {
            data() {
              return {
                departments: []
              }
            },
            methods:{
        submitDepartment(){
            axios.post('/submit_department',{
                department_name : this.content,
            })
            .then(response=> {
              console.log(response);
              this.$toaster.success('Your toaster success message.')
              let uri = '/get_departments';
            axios.get(uri).then(response => {
              this.departments = response.data;
              console.log(response)
            });
            })
            .catch(error=> {
              console.log(error);
            });
        }
    },

        }
      </script>
    @endpush
