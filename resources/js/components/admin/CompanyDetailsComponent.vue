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
            <h1 class="m-0 text-dark">Company Details</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Details</li>
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
                <h4>Company Details</h4>
                <div class="card-header-action">
                  <!-- <button
                    class="btn btn-success"
                    data-toggle="modal"
                    data-target="#addNew"
                    @click="openModalWindow"
                  >
                    Add New <i class="fas fa-user-plus fa-fw"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company ID</th>
                      <th>Company Name</th>
                      <th>Address</th>
                      <th>Contact Number</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(company, index) in companies" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>{{company._id.$oid}}</td>
                      <td>{{ company.company_name }}</td>
                      <td>{{company.company_address}}</td>
                      <td>{{company.company_details}}</td>
                      <td>
                        <div v-show="company.company_status == 1" class="badge badge-success">Activated</div>
                        <div v-show="company.company_status == 2" class="badge badge-danger">Deactivated</div>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button
                            class="btn btn-danger dropdown-toggle"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            Action
                          </button>
                          <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuButton"
                          >
                            <a href="#" class="dropdown-item has-icon"
                              ><i class="fas fa-eye"></i> View</a
                            >
                            <a v-show="company.company_status == 2" href="#" class="dropdown-item has-icon"
                              ><i class="fas fa-thumbs-up"></i>Active</a
                            >
                            <a v-show="company.company_status == 1" href="#" class="dropdown-item has-icon"
                              ><i class="fas fa-thumbs-down"></i> Deactive</a
                            >
                            <a href="#" class="dropdown-item has-icon"
                              ><i class="far fa-edit"></i> Edit</a
                            >
                            <a class="dropdown-item" href="#">Delete </a>
                          </div>
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
    companies:[],
    };
  },
  methods: {
    loadCompanies() {
      this.$Progress.start();
      let uri = "get_companies_admin";
      axios.get(uri).then((response) => {
        this.companies = response.data;
        console.log(response);
      });
      this.$Progress.finish();
    },
  },
  created() {
       this.loadCompanies();
  },
};
</script>
