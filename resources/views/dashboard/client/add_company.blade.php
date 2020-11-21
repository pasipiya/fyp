@extends('dashboard.layouts.dashboardApp')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Company</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Company</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                Create Company
              </button>
            </div>
            <!-- /.col-md-6 -->
          </div>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

 
          <!-- Main row -->
          <div class="row">
            <div class="col-md-12">

                <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                <div class="card">
                    <div class="card-body">
                        <form id="ajaxform">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required="">
                            </div>
                
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required="">
                            </div>
                
                            <div class="form-group">
                                <strong>Mobile Number:</strong>
                                <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile" required="">
                            </div>
                            <div class="form-group">
                                <strong>Message:</strong>
                                <input type="text" name="message" class="form-control" placeholder="Enter Your Message" required="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success save-data">Save</button>
                            </div>
                        </form>
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
              <h4 class="modal-title">Adicionar nova Viagem</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- form start -->
                <form role="form" method="POST" action="">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                        <label>Comapny Name:</label>
                        <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required="">
                    </div>

                    <div class="form-group">
                        <strong>Company Details:</strong>
                        <input type="text" name="message" class="form-control" placeholder="Enter Your Message" required="">
                    </div>
  
                  </div>
                  <!-- /.card-body -->
  
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar vôo</button>
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
     $(".save-data").click(function(event){
          event.preventDefault();
    
          let name = $("input[name=name]").val();
          let email = $("input[name=email]").val();
          let mobile_number = $("input[name=mobile_number]").val();
          let message = $("input[name=message]").val();
          let _token   = $('meta[name="csrf-token"]').attr('content');
    
          $.ajax({
            url: "/ajax-request",
            type:"POST",
            data:{
              name:name,
              email:email,
              mobile_number:mobile_number,
              message:message,
              _token: _token
            },
            success:function(response){
              console.log(response);
              if(response) {
                $('.success').text(response.success);
                $("#ajaxform")[0].reset();
              }
            },
           });
      });
    </script>
    @endpush