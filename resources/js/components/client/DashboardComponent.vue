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
            <h1 class="m-0 text-dark">SL Fleet - Dashboard</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">SL Fleet - Dashboard</li>
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
        <div class="row flex-column-reverse flex-md-row" >
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon-square card-icon-bg-green">
                <i class="fas fa-hiking"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> 1
                    </h3>
                    <span class="text-muted">Total Vehicles</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon-square card-icon-bg-cyan">
                <i class="fas fa-chart-line"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> 1
                    </h3>
                    <span class="text-muted">Total Vehicles</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon-square card-icon-bg-purple">
                <i class="fas fa-cart-plus"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> 1
                    </h3>
                    <span class="text-muted">Total Drivers</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
            <!-- <div class="card card-statistic-1">
              <div class="card-icon-square card-icon-bg-orange">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> $100
                    </h3>
                    <span class="text-muted">Due Payments</span>
                  </div>
                </div>
              </div>
            </div> -->
              <!-- <VueClock /> -->
               <div style="margin-bottom:20px">
  <clock size="100px" border="none" bg="radial-gradient(circle, #ecffe5, #fffbe1, #38ff91)"></clock>
               </div>

          </div>


        </div>

        <!-- Main row -->
        <div class="row">
          <div class="col-md-9" style="margin-bottom:20px">
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
                v-for="(m, index) in vehicleData"
                :key="index"
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

    <!-- Vehicle {{ m.vehicle_id }} -->
    Vehicle : Vehicle 1
    <br>
    Diver : Pasindu
                <br />
                Speed : {{ m.speed }} kmh
                <br />
                RPM : {{ m.rpm }}


              </gmap-info-window>
            </gmap-map>
          </div>
          <div class="col-md-3">
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
                      Fleets
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
                      People
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
                      <div class="card-body">
                        <ol style="margin-top: -30px" class="list-group">
                          <li>
                            <router-link
                              v-for="(vehicle, index) in vehicleData"
                              :key="index"
                              :to="{
                                name: 'vehicle_parameters',
                                params: { id: vehicle.vehicle_id},
                              }"
                              class="nav-link"
                            >
                              <!-- <i class="nav-icon fas fa-th"></i> -->
                              <!-- <span> {{ vehicle.vehicle_id }}</span> -->
                             <span> Vehicle 1 </span>
                            </router-link>
                          </li>
                        </ol>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div
                      id="collapseTwo"
                      class="collapse"
                      aria-labelledby="headingTwo"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">People</div>
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

      <div style="margin-top: 40px" id="calander" class="row">
        <!-- <vue-event-calendar :events="demoEvents"></vue-event-calendar> -->
        <calendar-view
          :show-date="showDate"
          :items="events"
          :doEmitItemMouseEvents="true"
          @click-item="onClickEvent"
          class="theme-default holiday-us-traditional holiday-us-official"
        >
          <calendar-view-header
            slot="header"
            slot-scope="t"
            :header-props="t.headerProps"
            @input="setShowDate"
          />
        </calendar-view>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</template>
<script>
import { CalendarView, CalendarViewHeader } from "vue-simple-calendar";
require("vue-simple-calendar/static/css/default.css");
require("vue-simple-calendar/static/css/holidays-us.css");


export default {

    //components: { Clock },
  data() {
    return {
        time: '10:40:00',
      userData: [],
      icon: this.getSiteIcon(3),
      vehicleData: [],
      info_marker: null,
      infowindow: { lat: 6.436914, lng: 3.451432 },
      window_open: false,
      //vehicleData: [],
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
      events: [
        {
          id: "e1",
          startDate: "2021-2-19",
          endDate: "2021-2-19",
          title: "Sample event 1",
        },
        {
          startDate: "2021-2-05",
          endDate: "2021-2-06",
          title: "Sample event 2",
        },
      ],
      showDate: new Date(),
      //   editMode: false,
      //   departments: [],
      //   form: new Form({
      //     id: "",
      //     department_name: "",
      //   }),
    };
  },
  components: {
    CalendarView,
    CalendarViewHeader,
  },
  methods: {
    setShowDate(d) {
      this.showDate = d;
    },
    onClickEvent(e) {
      alert(e.title);
    },
    getUser() {
      let uri = "get_user_data";
      axios.get(uri).then((response) => {
        this.userData = response.data;
        //console.log(this.userData);
        //return this.vehicleData;
      });
    },

    loadVehicleData() {
      let uri = "get_vehicle_data";
      axios.get(uri).then(() => {});

      //   Echo.channel("location").listen("LocationEvent", (e) => {
      //     console.log(e);
      //     // this.vehicleData=null
      //     // this.vehicleData = e.vehicleData;
      //     // return this.vehicleData;
      //   });
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
      //console.log(markers);
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

  // mounted() {
  //        Echo.channel("location").listen("LocationEvent", e => {
  //         //console.log(e.update);
  //         console.log(e);
  //     });
  // },

  created() {
    //     Echo.channel("location").listen("LocationEvent", e => {
    //     //console.log(e.update);
    //     console.log(e);
    // });

    this.getUser();
    this.getMarkers();
    this.loadVehicleData();
    this.obj = setInterval(() => this.loadVehicleData(), 10000);

    Echo.channel("location").listen("LocationEvent", (e) => {
      console.log(e);
      this.vehicleData = e.vehicleData;
      console.log(this.vehicleData);
      return this.vehicleData;
    });

    //this.obj=setInterval(() => this.loadVehicleData(),5000);
    this.window_open = true;
    //paths: this.polygon;
    //console.log("home created");
    //this.preloader();
  },
  destroyed() {
    clearInterval(this.obj);
    console.log("Component destroyed.");
  },
};
</script>
<style>
#calander {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  color: #2c3e50;
  height: 100%;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}
</style>
