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
            <h1 class="m-0 text-dark">User Details</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Details</li>
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
                <h4>User Details</h4>
                <div class="card-header-action"></div>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Company Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user, index) in users" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.company_name }}</td>
                      <td>
                        <div
                          v-show="user.user_status == 1"
                          class="badge badge-success"
                        >
                          Activated
                        </div>
                        <div
                          v-show="user.user_status == 0"
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
                              href="#"
                              class="dropdown-item has-icon"
                              @click="showVehicles(user._id.$oid)"
                              ><i class="fas fa-eye"></i> Vehicles</a
                            >
                            <a
                              v-show="user.user_status == 0"
                              href="#"
                              @click="activeUser(user._id.$oid)"
                              class="dropdown-item has-icon"
                              ><i class="fas fa-thumbs-up"></i>Active</a
                            >
                            <a
                              v-show="user.user_status == 1"
                              href="#"
                              @click="deactiveUser(user._id.$oid)"
                              class="dropdown-item has-icon"
                              ><i class="fas fa-thumbs-down"></i> Deactive</a
                            >
                            <a href="#" class="dropdown-item has-icon"
                              ><i class="far fa-edit"></i> Edit</a
                            >
                            <a
                              class="dropdown-item"
                              href="#"
                              @click="delete_users(user._id.$oid)"
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
          id="vehicleModel"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addNewLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Vehicle Details</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <table class="table">
                    <thead>
                      <tr v-for="(vehicle, index) in vehicles" :key="index">
                        <th>#</th>
                        <th>Company ID</th>
                        <th>Vehicle ID</th>
                        <th>OBD</th>
                        <th>License</th>
                        <th>Model</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(vehicle, index) in vehicles" :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>{{ vehicle.company_id }}</td>
                        <td>{{ vehicle._id.$oid }}</td>
                        <td>{{ vehicle.vehicle_obd_mac }}</td>
                        <td>{{ vehicle.license_plate }}</td>
                        <td>{{ vehicle.vehicle_model }}</td>
                      </tr>
                    </tbody>
                  </table>
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
      users: [],
      vehicles: [],
    };
  },
  methods: {
    loadUsers() {
      this.$Progress.start();
      let uri = "get_users_admin";
      axios.get(uri).then((response) => {
        this.users = response.data;
      });
      this.$Progress.finish();
    },
    delete_users(id) {
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
          //Send Request to server
          //this.form
          //.get("delete_department/" + id)
          axios
            .get("delete_user/" + id)
            .then((response) => {
              Swal.fire("Deleted!", "User deleted successfully", "success");
              this.loadUsers();
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
    showVehicles(id) {
      this.$Progress.start();
      axios.get("get_vehicles_admin/" + id).then((response) => {
        this.vehicles = response.data;
        console.log(response.data);
      });
      this.$Progress.finish();
      $("#vehicleModel").modal("show");
    },
    activeUser(id) {
      this.$Progress.start();
      axios
        .get("active_user/" + id)
        .then(() => {
          this.$toaster.success("User activated successfully.");
          this.$Progress.finish();
        })
        .catch(() => {
          console.log("Error......");
        });
      this.loadUsers();
    },
    deactiveUser(id) {
      this.$Progress.start();
      axios
        .get("deactive_user/" + id)
        .then(() => {
          this.$toaster.success("User deactivated successfully.");
          this.$Progress.finish();
        })
        .catch(() => {
          console.log("Error......");
        });
      this.loadUsers();
    },
  },
  created() {
    this.loadUsers();
  },
};
</script>
