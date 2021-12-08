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
              <li class="breadcrumb-item active">General Settings</li>
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
            <form
              enctype="multipart/form-data"
              @submit.prevent="updateGeneralSettings()"
            >
              <div class="card">
                <div class="card-header">
                  <h4>Data Sync Settings</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Data Sync Frequency - Embedded Device</label>
                        <select v-model="generalSettings.frequency" class="form-control">
                          <option value="1">1 seconds</option>
                          <option value="2">2 seconds</option>
                          <option value="5">5 seconds</option>
                          <option value="10">10 seconds</option>
                          <option value="15">15 seconds</option>
                          <option value="20">20 seconds</option>
                          <option value="30">30 seconds</option>
                          <option value="50">50 seconds</option>
                          <option value="60">60 seconds</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label class="d-block">Data Acquisition</label>
                        <div class="form-check">
                          <input
                            v-model="generalSettings.gps"
                            class="form-check-input"
                            type="checkbox"
                          />
                          <label class="form-check-label"> GPS </label>
                        </div>
                        <div class="form-check">
                          <input
                            v-model="generalSettings.rpm"
                            class="form-check-input"
                            type="checkbox"
                            id="defaultCheck3"
                          />
                          <label class="form-check-label"> RPM </label>
                        </div>
                        <div class="form-check">
                          <input
                            v-model="generalSettings.speed"
                            class="form-check-input"
                            type="checkbox"
                          />
                          <label class="form-check-label"> SPEED </label>
                        </div>
                        <div class="form-check">
                          <input
                            v-model="generalSettings.vehicle_run_time"
                            class="form-check-input"
                            type="checkbox"
                          />
                          <label class="form-check-label">
                            Vehicle Run Time
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer text-left">
                  <button type="submit" class="btn btn-primary">
                    Save Changes
                  </button>
                </div>
              </div>
            </form>
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
      generalSettings: [],
      form: new Form({
          id:"",
        rpm: "",
        gps: "",
        speed: "",
        vehicle_run_time: "",
        frequency:""
      }),
    };
  },
  methods: {
    loadGeneralSettings() {
      this.$Progress.start();
      let uri = "general_settings";
      axios.get(uri).then((response) => {
        this.generalSettings = response.data;
      });
      this.$Progress.finish();
    },
    updateGeneralSettings() {
      this.$Progress.start();
      this.form.id=this.generalSettings._id.$oid;
      this.form.rpm = this.generalSettings.rpm;
      this.form.gps = this.generalSettings.gps;
      this.form.speed = this.generalSettings.speed;
      this.form.vehicle_run_time = this.generalSettings.vehicle_run_time;
      this.form.frequency = this.generalSettings.frequency;
      this.form
        .post("general_settings")
        .then(() => {
          this.$toaster.success("General Settings updated successfully.");

          this.$Progress.finish();

          $("#addNew").modal("hide");
        })
        .catch(() => {
          console.log("Error......");
        });
      this.loadGeneralSettings();
    },
  },
  created() {
    this.loadGeneralSettings();
  },
};
</script>
