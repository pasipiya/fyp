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
            <h1 class="m-0 text-dark">Accident Hot Spots</h1>
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
        <div class="row mt-5">
          <div class="col-md-12">
               <gmap-map
              :center="{ lat: 7.290871, lng: 80.296412 }"
              :zoom="7"
              style="width: 100%; height: 400px"
            ></gmap-map>
          </div>
        </div>

        <!--Form -->
           <div class="row mt-5">
          <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Accident Hot Spots</h4>
                  </div>
                  <div class="card-body">
                   <div class="form-group">
                      	<label>File</label>
	                      <input type="file" class="form-control">
	                    </div>
                        <a href="#" class="btn btn-success">Submit</a>
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

<script>
//import preloaderComponent from '../theme_components/preloaderComponent.vue';
export default {
  //components: { preloaderComponent },
  data() {
    return {

    };
  },
  methods: {



  },

  created() {

  },
};
</script>
