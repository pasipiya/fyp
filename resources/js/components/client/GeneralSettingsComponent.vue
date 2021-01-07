<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
            <!--Preloader-->
    <theme-preloader></theme-preloader>
    <!--End Preloader-->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">General Settings</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Sync Settings</h4>
                  </div>
                  <div class="card-body">
                  <div class="row">
              		<div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="form-group">
	                      <label>Company Email</label>
	                      <input type="email" class="form-control">
	                    </div>

	                    <div class="form-group">
	                         <label>Data Sync Frequency - Embedded Device</label>
	                      <select class="form-control">
                            <option>1 seconds</option>
	                        <option>2 seconds</option>
	                        <option>5 seconds</option>
	                        <option>10 seconds</option>
                            <option>15 seconds</option>
                            <option>20 seconds</option>
                            <option>30 seconds</option>
                            <option>50 seconds</option>
                            <option>60 seconds</option>
	                      </select>
	                    </div>
	                <div class="form-group">
	                      <label class="d-block">Data Acquisition</label>
	                      <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="defaultCheck1">
	                        <label class="form-check-label" for="defaultCheck1">
	                          GPS
	                        </label>
	                      </div>
	                      <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="defaultCheck3">
	                        <label class="form-check-label" for="defaultCheck3">
	                          RPM
	                        </label>
	                      </div>
                            <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="defaultCheck3">
	                        <label class="form-check-label" for="defaultCheck3">
	                          SPEED
	                        </label>
	                      </div>
                            <div class="form-check">
	                        <input class="form-check-input" type="checkbox" id="defaultCheck3">
	                        <label class="form-check-label" for="defaultCheck3">
	                          Vehicle Run Time
	                        </label>
	                      </div>
	                    </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
		                <div class="form-group">
	                      <label>Company ID</label>
	                      <input placeholder="SLFM123" type="text" class="form-control">
	                    </div>

<div class="form-group">
	                      <label>Data Sync Frequency - Client Software</label>
	                      <select class="form-control">
	                        <option>1 seconds</option>
	                        <option>2 seconds</option>
	                        <option>5 seconds</option>
	                        <option>10 seconds</option>
                            <option>15 seconds</option>
                            <option>20 seconds</option>
                            <option>30 seconds</option>
                            <option>50 seconds</option>
                            <option>60 seconds</option>
	                      </select>
	                    </div>






	                          <div class="form-group">
	                      <label>Security Key</label>
	                      <input type="text" class="form-control">
	                    </div>

	                </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                               <div class="form-group">
	                      <label>Company Tel No</label>
	                      <input type="text" class="form-control">
	                    </div>


   <div class="form-group">
	                      <label>Speed Limit Alert (km/h)</label>
	                      <input type="number" placeholder="100" class="form-control">
	                    </div>







	                </div>
	                </div>


                  </div>
                </div>
              </div>
           </div>



        <!-- /.row -->
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</template>
