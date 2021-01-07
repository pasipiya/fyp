<template >
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
            <h1 class="m-0 text-dark">Dashboard v2</h1>
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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-cyan">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="card-body card-type-3">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mt-2 mb-1">Users</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-cyan">
                <i class="fas fa-car" aria-hidden="true"></i>
              </div>
              <div class="card-body card-type-3">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mt-2 mb-1">Vehicles</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-cyan">
                <i class="fas fa-search-dollar" aria-hidden="true"></i>
              </div>
              <div class="card-body card-type-3">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mt-2 mb-1">Drivers</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-cyan">
                <i class="fa fa-balance-scale" aria-hidden="true"></i>
              </div>
              <div class="card-body card-type-3">
                <div class="row">
                  <div class="col">
                    <h6 class="text-muted mt-2 mb-1">Income - Expense</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <div class="col-md-8">
   <gmap-map
              :center="{ lat: 7.290871, lng: 80.296412 }"
              :zoom="7"
              style="width: 100%; height: 400px"
            >
              <gmap-polyline
                v-bind:path.sync="path"
                v-bind:options="{ strokeColor: '#cc0000' }"
              >
              </gmap-polyline>

              <!-- <gmap-marker
              :position="{lat:41.508742, lng:-1.120850}"
              :clickable="true"
            ></gmap-marker> -->

              <gmap-marker
                v-for="(m, index) in vehicleData" :key="index"
                :position="m.position"
                :clickable="true"
                :icon="icon"
                @click="openWindow"
              ></gmap-marker>

              <gmap-info-window
                :key="'A' + i"
                v-for="(m, i) in vehicleData"
                @closeclick="window_open = false"
                :opened="window_open"
                :position="m.position"
                :options="{
                  pixelOffset: {
                    width: 0,
                    height: -35,
                  },
                }"
              >
                Vehicle {{m.vehicle_id}}
                <br />
                Speed : {{m.speed}}kmh
                <br>
                RPM : {{m.rpm}}
              </gmap-info-window>
            </gmap-map>




          </div>
          <div class="col-md-4">
            <router-link
              :to="{ name: 'vehicle_parameters', params: { id: 12 } }"
              class="nav-link"
            >
              <i class="nav-icon fas fa-th"></i>
              <span> Vehicle Parameters</span>
            </router-link>


            <div class="card">
              <div class="card-header">

            <div class="row">
              <div class="col d-flex justify-content-center">
                <button
                  class="btn btn-success"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  Vehicles
                </button>
              </div>
              <div class="col d-flex justify-content-center">
                <button
                  class="btn btn-success collapsed"
                  type="button"
                  data-toggle="collapse"
                  data-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  History
                </button>
              </div>
            </div>
              </div>
              <div class="card-body">
                <div id="accordionExample" class="accordion">
                  <div class="row">
                    <div
                      id="collapseOne"
                      class="collapse show"
                      aria-labelledby="headingOne"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">Vehicles</div>
                    </div>
                  </div>
                  <div class="row">
                    <div
                      id="collapseTwo"
                      class="collapse"
                      aria-labelledby="headingTwo"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">History</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
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
        icon: this.getSiteIcon(3),
        vehicleData:[],
      info_marker: null,
      infowindow: { lat: 6.436914, lng: 3.451432 },
      window_open: false,
      vehicleData:[],
      markers: [
        {
          position: {
            lat: 41.585095,
            lng: -2.624523,
          },
          position: {
            lat: 42.585095,
            lng: -1.624523,
          },
        },
      ],
      path: [
        // { lat: 6.436914, lng: 3.451432 },
        // { lat: 6.436019, lng: 3.450917 },
        // { lat: 6.436584, lng: 3.450917 },
        // { lat: 6.435006, lng: 3.450928 },
        // { lat: 6.434953, lng: 3.451808 },
        // { lat: 6.435251, lng: 3.451765 },
        // { lat: 6.435262, lng: 3.451969 },
        // { lat: 6.435518, lng: 3.451958 }
        { lat: 55.9352001, lng: -4.7766924 },
        { lat: 55.9358131, lng: -4.7770143 },
        { lat: 55.9361256, lng: -4.7767353 },
        { lat: 55.9366784, lng: -4.7739458 },
      ],
      //   editMode: false,
      //   departments: [],
      //   form: new Form({
      //     id: "",
      //     department_name: "",
      //   }),
    };
  },
  methods: {
    loadVehicleData() {
        let uri = "get_vehicle_data";
        axios.get(uri).then((response) => {
          this.vehicleData = response.data;
          console.log(this.vehicleData);
          //return this.vehicleData;
          this.vehicleData = response.data;
        });
    //       for (let i = 0; i < this.vehicleData.length; i++) {
    //     markers.push({
    //       position: tempLatLong[i],
    //       title: "test title",
    //       //icon: this.getSiteIcon(3), // if you want to show different as per the condition.
    //     });
    //   }
    //    console.log(this.vehicleData);

    },
    openWindow() {
      this.window_open = true;
    },
    getMarkers() {
      // generating markers for site map
      var markers = [];
      // remove this after lat long received from api.
      const tempLatLong = [
        { lat: 55.9352001, lng: -4.7766924 },
        { lat: 7.9068361, lng: 80.116971 },
        { lat: 8.9168362, lng: 90.076972 },
        { lat: 7.9268363, lng: 82.136973 },
        { lat: 9.9368364, lng: 95.146974 },
        { lat: 8.9468365, lng: 89.106975 },
        { lat: 6.9568366, lng: 95.166976 },
        { lat: 5.9668367, lng: 96.176977 },
        { lat: 9.9768368, lng: 83.016978 },
        { lat: 10.9868369, lng: 75.196979 },
      ];
      for (let i = 0; i < tempLatLong.length; i++) {
        markers.push({
          position: tempLatLong[i],
          title: "test title",
          //icon: this.getSiteIcon(3), // if you want to show different as per the condition.
        });
      }
      console.log(markers)
      return markers;

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
            //return require("@/assets/images/icons/map-marker-lifesafety.svg");
            break;
          default:
          //return require("@/assets/images/icons/map-marker-online.svg");
        }
      } catch (e) {
        return null;
      }
    },
    // preloader() {
    //   $(document).ready(function () {
    //     $(".preloader").fadeOut(1000, function () {
    //       $(".loader").remove();
    //     });
    //   });
    // },
  },

  created() {
    this.getMarkers()
    this.loadVehicleData()
    setInterval(() => this.loadVehicleData(), 1000);
    this.window_open = true;
    paths: this.polygon;
    //this.preloader();
  },
};
</script>
