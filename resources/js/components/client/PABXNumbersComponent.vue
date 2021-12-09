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
            <h1 class="m-0 text-dark">Soft PABX</h1>
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

            <div class="card card-light">
             <div class="card-header">
                    <h4>PABX Numbers</h4>
                    <form class="card-header-form">
                      <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
            <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>PABX Number</th>
                      <th>Secret Key</th>
                      <th>Host</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(pabx, index) in pabxs" :key="index">
                    <td>{{ index + 1 }}</td>
                      <td>{{pabx.username}}</td>
                      <td>{{pabx.pabx_number}}</td>
                      <td>{{pabx.secret_key}}</td>
                      <td>{{pabx.host}}</td>
                      <td>
                        <div
                          v-show="pabx.status == 1"
                          class="badge badge-success"
                        >
                          Activated
                        </div>
                        <div
                          v-show="pabx.status == 0"
                          class="badge badge-danger"
                        >
                          Deactivated
                        </div>
                      </td>
                    </tr>
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
  </div>
  <!-- /.content-wrapper -->
</template>

<script>
//import preloaderComponent from '../theme_components/preloaderComponent.vue';
export default {
  //components: { preloaderComponent },
  data() {
    return {
        pabxs:[],
    };
  },
  methods: {
    loadPABX() {
      this.$Progress.start();
      let uri = "pabx_company";
      axios.get(uri).then((response) => {
        this.pabxs = response.data;
        console.log(response);
      });
      this.$Progress.finish();
    },
  },

  created() {
    this.loadPABX();
  },
};
</script>
