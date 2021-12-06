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
            <h1 class="m-0 text-dark">Employee</h1>
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
                      <th>Employee Name</th>
                      <th>Employee Type</th>
                       <th>Mobile Number</th>
                       <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(employee, index) in employees" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>{{ employee.employee_name }}</td>
                      <td>{{employee.employee_type}}</td>
                        <td>{{employee.mobile}}</td>
                          <td>     <div
                        v-show="employee.employee_status == 1"
                        class="badge badge-success"
                      >
                        Activated
                      </div>
                      <div
                        v-show="employee.employee_status == 0"
                        class="badge badge-danger"
                      >
                        Deactivated
                      </div></td>
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
                          <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                              <a  @click="empActive(employee._id.$oid)" v-show="employee.employee_status==0" href="#" class="dropdown-item has-icon"><i class="fas fa-thumbs-up"></i>Active</a>
                            <a  @click="empDeactive(employee._id.$oid)" v-show="employee.employee_status==1" href="#" class="dropdown-item has-icon"><i class="fas fa-thumbs-down"></i> Deactive</a>
                          <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                            <a
                              class="dropdown-item"
                              href="#"
                              @click="deleteEmployee(employee._id.$oid)"
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


<!--Model-->
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
                  Add New Employee
                </h5>
                <h5 v-show="editMode" class="modal-title" id="addNewLabel">
                  Update Employee
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
                  editMode ? updateEmployee() : createEmployee()
                "
              >
                <div class="modal-body">

         <div class="form-group">
                    <label>Select Employee Type</label>
                    <select
                     v-model="form.department_id"
                      name="department_id"
                      id="department_id"
                      class="form-control"
                    >
                      <option value="Logistics">Logistics</option>
                      <option value="Management">Management</option>
                    </select>
                  </div>

     <div class="form-group">
                    <label>Select Employee Type</label>
                    <select
                      v-model="form.employee_type"
                      name="employee_type"
                      id="employee_type"
                      class="form-control"
                    >
                      <option value="Driver">Driver</option>
                      <option value="Clark">Clark</option>
                      <option value="A March w Stick OH">
                        Manager
                      </option>
                    </select>
                  </div>



                  <div class="form-group">
                    <input
                      v-model="form.employee_name"
                      type="text"
                      name="employee_name"
                      id="employee_name"
                      placeholder="Employee Name"
                      required
                      class="form-control"
                      :class="{
                        'is-invalid': form.errors.has('employee_name'),
                      }"
                    />
                    <has-error :form="form" field="employee_name"></has-error>
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

 <!--End Model-->





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
      editMode: false,
      employees: [],
      form: new Form({
        id: "",
        department_id:"",
        employee_type:"",
        employee_name: "",
      }),
    };
  },
  methods: {
    loadEmployees() {
      //   axios.get("/usertest").then((data) => (this.users = data.data));
      //     console.log(users)
      this.$Progress.start();
      let uri = "get_employees";
      axios.get(uri).then((response) => {
        this.employees = response.data;
        console.log(response);
      });
      this.$Progress.finish();

      //pick data from controller and push it into users object
    },
    openModalWindow() {
      this.editMode = false;
      this.form.reset();
      $("#addNew").modal("show");
    },
    createEmployee() {
      this.$Progress.start();

      this.form
        .post("submit_employee")
        .then(() => {
          this.$toaster.success("Employee added successfully.");

          this.$Progress.finish();

          $("#addNew").modal("hide");
        })
        .catch(() => {
          console.log("Error......");
        });

      this.loadEmployees();
    },
    deleteEmployee(id) {
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
            .get("delete_employee/" + id)
            .then((response) => {
              Swal.fire("Deleted!", "Employee deleted successfully", "success");
              this.loadEmployees();
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
    updateEmployees() {},


    empActive(id){
    this.$Progress.start();
        axios
           .get("active_employee/" + id)
        .then((response) => {
          this.$toaster.success("Employee activated successfully.");
          this.$Progress.finish();
            this.loadEmployees();
        })
        .catch(() => {
          this.$toaster.warning("Something goes wrong");
        });
    },
    empDeactive(id){
         this.$Progress.start();
        axios
           .get("deactive_employee/" + id)
        .then((response) => {
          this.$toaster.warning("Employee deactivated successfully.");
          this.$Progress.finish();
            this.loadEmployees();
        })
        .catch(() => {
          this.$toaster.warning("Something goes wrong");
        });
    },
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
    this.loadEmployees();
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
