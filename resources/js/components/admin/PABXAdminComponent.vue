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
                <h4>PABX Table</h4>
                <div class="card-header-action">
                  <button
                    class="btn btn-success"
                    data-toggle="modal"
                    data-target="#addNew"
                    @click="openModalWindow"
                  >
                    Add New <i class="fas fa-user-plus fa-fw"></i>
                  </button>
                </div>
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
                      <th>Action</th>
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
                            <a
                              v-show="pabx.status == 0"
                              href="#"
                              @click="activePABX(pabx._id.$oid)"
                              class="dropdown-item has-icon"
                              ><i class="fas fa-thumbs-up"></i>Active</a
                            >
                            <a
                              v-show="pabx.status == 1"
                              href="#"
                              @click="deactivePABX(pabx._id.$oid)"
                              class="dropdown-item has-icon"
                              ><i class="fas fa-thumbs-down"></i> Deactive</a
                            >
                            <a
                              class="dropdown-item"
                              href="#"
                              @click="deletePABX(pabx._id.$oid)"
                              >Delete
                            </a>
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

        <!--Model-->
        <div
          class="modal fade"
          id="addNew"
          tabindex="-1"
          role="dialog"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5>Add New PABX</h5>

                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form
                enctype="multipart/form-data"
                @submit.prevent="createPABX()"
              >
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Compay</label>
                        <select
                          name="company"
                          v-model="form.company"
                          class="form-control"
                        >
                          <option v-for="(company, index) in companies" :key="index">{{company.company_name}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>User Name</label>
                        <input
                          v-model="form.username"
                          type="text"
                          name="name"
                          id="name"
                          placeholder="Username"
                          required
                          class="form-control"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PABX Number</label>
                        <input
                          v-model="form.pabx_number"
                          type="text"
                          name="pabx_number"
                          id="pabx_number"
                          placeholder="PABX Number"
                          required
                          class="form-control"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Secret Key</label>
                        <input
                          v-model="form.secret_key"
                          type="text"
                          name="secret_key"
                          id="secret_key"
                          placeholder="Secret Key"
                          required
                          class="form-control"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Host</label>
                        <input
                          v-model="form.host"
                          type="text"
                          name="host"
                          id="host"
                          placeholder="Host"
                          required
                          class="form-control"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-danger"
                    data-dismiss="modal"
                  >
                    Close
                  </button>
                  <button type="submit" class="btn btn-success">Create</button>
                </div>
              </form>
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
      pabxs: [],
      companies:[],
      form: new Form({
      }),
    };
  },
  methods: {
      getCompanies(){
        let uri = "get_companies_admin";
        axios.get(uri).then((response) => {
        this.companies = response.data;
        console.log(response);
      });
      },
    loadPABX() {
      this.$Progress.start();
      let uri = "pabx";
      axios.get(uri).then((response) => {
        this.pabxs = response.data;
        console.log(response);
      });
      this.$Progress.finish();
    },
    openModalWindow() {
      this.form.reset();
      $("#addNew").modal("show");
    },
    createPABX() {
      this.$Progress.start();
      this.form
        .post("pabx")
        .then(() => {
          this.$toaster.success("PABX created successfully.");

          this.$Progress.finish();

          $("#addNew").modal("hide");
        })
        .catch(() => {
          console.log("Error......");
        });

      this.loadPABX();
    },
    deletePABX(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          axios
            .get("delete_pabx/" + id)
            .then((response) => {
              Swal.fire("Deleted!", "PABX deleted successfully", "success");
              this.loadPABX();
              console.log(response);
            })
            .catch(() => {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
              });
            });
        }
      });
    },
  },

  created() {
      this.loadPABX();
      this.getCompanies();
  },
};
</script>
