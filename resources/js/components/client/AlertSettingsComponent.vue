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
            <h1 class="m-0 text-dark">Alert Settings</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Alert Settings</li>
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
              @submit.prevent="updateAlertSettings()"
            >
            <div class="card">
              <div class="card-header">
                <h4>Alert Settings</h4>
              </div>
              <div class="card-body">

                <div class="row">
                  <div class="col-lg-4 col-md-12 col-sm-12">
                       <div class="form-group">
                      <label>Speed Alert</label>
                      <br>
                    <div class="pretty p-switch p-fill">
                      <input
                       v-model="alertSettings.speed_alert" type="checkbox" />
                      <div class="state p-success">
                        <label>Speed</label>
                      </div>
                       </div>
                    </div>
                  </div>

                      <div class="col-lg-4 col-md-12 col-sm-12">
                       <div class="form-group">
                      <label>RPM Alert</label>
                      <br>
                    <div class="pretty p-switch p-fill">
                      <input
                      v-model="alertSettings.rpm_alert" type="checkbox" />
                      <div class="state p-success">
                        <label>RPM</label>
                      </div>
                       </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Speed Limit Alert (km/h)</label>
                      <input
                      v-model="alertSettings.speed_limit"
                        type="number"
                        placeholder="100"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Engine Speed Limit Alert (RPM)</label>
                      <input
                      v-model="alertSettings.rpm_limit"
                        type="number"
                        placeholder="100"
                        class="form-control"
                      />
                    </div>
                  </div>
                </div>
              </div>
                <div class="card-footer text-left"><button type="submit" class="btn btn-primary">Save Changes</button></div>
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
      alertSettings: [],
      form: new Form({
          id:"",
        speed_alert: "",
        rpm_alert: "",
        speed_limit: "",
        rpm_limit: "",
      }),
    };
  },
  methods: {
    loadAlertSettings() {
      this.$Progress.start();
      let uri = "alert_settings";
      axios.get(uri).then((response) => {
        this.alertSettings = response.data;
      });
      this.$Progress.finish();
    },
    updateAlertSettings() {
      this.$Progress.start();
      this.form.id=this.alertSettings._id.$oid;
      this.form.speed_alert = this.alertSettings.speed_alert;
      this.form.rpm_alert = this.alertSettings.rpm_alert;
      this.form.speed_limit = this.alertSettings.speed_limit;
      this.form.rpm_limit = this.alertSettings.rpm_limit;

      this.form
        .post("alert_settings")
        .then(() => {
          this.$toaster.success("Alert Settings updated successfully.");

          this.$Progress.finish();

          $("#addNew").modal("hide");
        })
        .catch(() => {
          console.log("Error......");
        });
      this.loadAlertSettings();
    },
  },
  created() {
    this.loadAlertSettings();
  },
};
</script>
