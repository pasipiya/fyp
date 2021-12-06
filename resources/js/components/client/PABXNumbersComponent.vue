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
                  <div v-show="sub_pabx==0" class="alert alert-danger">
                      You need to subscribe Soft PABX feature on settings
                    </div>
              <div v-show="sub_pabx==1" class="table-responsive">
                      <table class="table table-sm">
                        <thead>
                          <tr>
	                          <th scope="col">#</th>
	                          <th scope="col">Employee Name</th>
	                          <th scope="col">Employee Type</th>
                              <th scope="col">User Name</th>
	                          <th scope="col">PABX Number</th>
                              <th scope="col">Secret Key</th>
                              <th scope="col">Server Name</th>
                            <th scope="col">Status</th>
	                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td>1</td>
                          <td>name</td>
                          <td>type</td>
                           <td>user name</td>
                          <td>pxbx number</td>
                           <td>secret key</td>
                           <td>server name</td>
                          <td><div class="badge badge-success">Activated</div></td>

                        </tr>
                        </tbody>
                      </table>
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

<script>
//import preloaderComponent from '../theme_components/preloaderComponent.vue';
export default {
  //components: { preloaderComponent },
  data() {
    return {
        sub_pabx:1,
      editMode: false,
      departments: [],
      form: new Form({
        id: "",
        department_name: "",
      }),
    };
  },
  methods: {
    loadUsers() {
      //   axios.get("/usertest").then((data) => (this.users = data.data));
      //     console.log(users)
      this.$Progress.start();
      let uri = "getDepatments";
      axios.get(uri).then((response) => {
        this.departments = response.data;
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
    deleteUser(id) {
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
    //this.loadUsers();
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
