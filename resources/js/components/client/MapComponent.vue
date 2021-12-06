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
            <h1 class="m-0 text-dark">Map</h1>
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
                <h4>Vehicle Map</h4>
                <div class="card-header-action"></div>
              </div>
              <div class="card-body">
                <gmap-map
                  :center="{ lat: 7.290871, lng: 80.296412 }"
                  :zoom="7"
                  style="width: 100%; height: 400px"
                >
                <!--
                  <gmap-polyline
                    v-bind:path.sync="path"
                    v-bind:options="{ strokeColor: '#0000ff' }"
                  >
                  </gmap-polyline>
-->
                    <gmap-marker
                v-for="(m, index) in path"
                :key="index"
                :position="m"
                :clickable="true"
                :icon="icon"

              ></gmap-marker>
                </gmap-map>
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
  data() {
    return {
      path: [],
        icon: this.getSiteIcon(4),
    };
  },
  methods: {
    loadVehicleLocation() {
      let uri = "get_vehicle_location";
      axios.get(uri).then((response) => {
        //console.log(response.data)
        for (let i = 0; i < response.data.length; i++) {
          this.path.push(response.data[i].position);
        }
        console.log(this.path);
      });
    },

        getSiteIcon(status) {
      try {
        switch (status) {
          case 1:
            return require("../assets/images/icons/car-rental.svg");
            break;
          case 2:
            return require("../assets/images/icons/car.svg");
            break;
          case 3:
            return require("../assets/images/icons/car-icon.png");
            break;
          case 4:
            return require("../assets/images/icons/icons8-red-circle-10.png");
            break;
          default:
            //return require("@/assets/images/icons/map-marker-online.svg");
        }
      } catch (e) {
        return null;
      }
    },

  },

  created() {
    this.loadVehicleLocation();
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
