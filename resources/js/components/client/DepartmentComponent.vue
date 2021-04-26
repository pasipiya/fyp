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
            <h1 class="m-0 text-dark">Department</h1>
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
                <h4>Department Table</h4>
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
                      <th>Department Name</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(department, index) in departments" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>{{ department.department_name }}</td>
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
                              class="dropdown-item"
                              href="#"
                              @click="deleteDepartment(department._id.$oid)"
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

        <div
          class="modal fade"
          id="addNew"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addNewLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 v-show="!editMode" class="modal-title" id="addNewLabel">
                  Add New User
                </h5>
                <h5 v-show="editMode" class="modal-title" id="addNewLabel">
                  Update User
                </h5>

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
                @submit.prevent="
                  editMode ? updateDepartment() : createDepartment()
                "
              >
                <div class="modal-body">
                  <div class="form-group">
                    <input
                      v-model="form.department_name"
                      type="text"
                      name="department_name"
                      id="department_name"
                      placeholder="Department Name"
                      required
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has('department_name'),
                      }"
                    />
                    <has-error :form="form" field="department_name"></has-error>
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
                  <button type="submit" class="btn btn-info">Update</button>
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
export default {
  data() {
    return {

      editMode: false,
      departments: [],
      form: new Form({
      }),
    };
  },
  methods: {
    loadUsers() {
      //   axios.get("/usertest").then((data) => (this.users = data.data));
      //     console.log(users)
      this.$Progress.start();
      let uri = "get_depatments";
      axios.get(uri).then((response) => {
        this.departments = response.data;
        console.log(this.departments);
      });
      this.$Progress.finish();

      //pick data from controller and push it into users object
    },
    openModalWindow() {
      this.editMode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    createDepartment() {
      this.$Progress.start();

      this.form
        .post("submit_department")
        .then(() => {
          this.$toaster.success("Department created successfully.");

          this.$Progress.finish();

          $("#addNew").modal("hide");
        })
        .catch(() => {
          console.log("Error......");
        });
      this.loadUsers();
    },
    deleteDepartment(id) {
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
            .get("delete_department/" + id)
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
                //footer: "<a href>Why do I have this issue?</a>",
              });
            });
        }
      });
    },
    updateDepartment() {},
    //   preloader() {
    //   $(document).ready(function () {
    //     $(".preloader").fadeOut(1000, function () {
    //       $(".loader").remove();
    //     });
    //   });
    // },
    // openModalWindow() {
    //   this.editMode = false;
    //   this.form.reset();
    //   $("#addNew").modal("show");
    // },
  },

  created() {
    this.loadUsers();
    //this.preloader();
    //this.$Progress.start();
    //this.$Progress.finish();
    //this.$toaster.success('Your toaster success message.')
    //  Toast.fire({
    //         icon: "success",
    //         title: "User updated successfully",
    //       });
    //Swal.fire('Any fool can use a computer')
  },
};
</script>
