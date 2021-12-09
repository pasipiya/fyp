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
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div>
          <!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
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
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-green">
                    <i class="fas fa-hiking"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{companies.length}}
                        </h3>
                        <span class="text-muted">Companies</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-orange">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{pabxs.length}}
                        </h3>
                        <span class="text-muted">Totatl PABX</span>
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
                          <i class="ti-arrow-up text-success"></i> {{totalVehiclesCount}}
                        </h3>
                        <span class="text-muted">Total Vehicles</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="
                  col-lg-3 col-md-6 col-sm-6 col-12
                  d-flex
                  justify-content-center
                "
              >
                <div style="margin-bottom: 20px">
                  <clock
                    size="100px"
                    border="none"
                    bg="radial-gradient(circle, #ecffe5, #fffbe1, #38ff91)"
                  ></clock>
                </div>
              </div>
            </div>

            <!--Map-->
            <!-- Main row -->
            <div class="row">
              <div class="col-md-8">
                <gmap-map
                  :center="{ lat: 7.290871, lng: 80.296412 }"
                  :zoom="7"
                  style="width: 100%; height: 400px"
                >
                  <!-- <gmap-polyline
                                v-bind:path.sync="path"
                                v-bind:options="{ strokeColor: '#cc0000' }"
                            >
                            </gmap-polyline> -->

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
                    Vehicle {{ m.vehicle_id }}
                    <br />
                    Speed : {{ m.speed }}kmh
                    <br />
                    RPM : {{ m.rpm }}
                  </gmap-info-window>
                </gmap-map>
              </div>
              <div class="col-md-4">
                <!-- <router-link
                            :to="{
                                name: 'vehicle_parameters',
                                params: { id: 12 }
                            }"
                            class="nav-link"
                        >
                            <i class="nav-icon fas fa-th"></i>
                            <span> Vehicle Parameters</span>
                        </router-link> -->

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
                            <ol
                              v-for="(company, index) in companies"
                              :key="index"
                            >
                              <li>
                                <a
                                  @click="showCompanyVehicles(company._id.$oid)"
                                >
                                  {{ company.company_name }}
                                </a>
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
                          <div class="card-body">
                            <ul
                              v-for="(company, index) in companies"
                              :key="index"
                            >
                              <li>{{ company.company_name }}</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!--End Map-->
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
        totalVehiclesCount:"",
        pabxs:[],
      companies: [],
      vehicleData: [],
      window_open: false,
      icon: this.getSiteIcon(3),
    };
  },
  methods: {
        loadPABX() {
      let uri = "pabx";
      axios.get(uri).then((response) => {
        this.pabxs = response.data;
        console.log(response);
      });
    },
      totalVehicles(){
        let uri = "total_vehicles";
        axios.get(uri).then((response) => {
        this.totalVehiclesCount = response.data;
      });
      },
    loadCompanies() {
      this.$Progress.start();
      let uri = "get_companies_admin";
      axios.get(uri).then((response) => {
        this.companies = response.data;
        //console.log(response);
      });
      this.$Progress.finish();
    },
    showCompanyVehicles(companyId) {
      //alert(companyId)
      let uri = "get_vehicle_data_admin/" + companyId;
      axios.get(uri).then((response) => {
        this.vehicleData = response.data;
        console.log(response)
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
            //return require("@/assets/images/icons/map-marker-lifesafety.svg");
            break;
          default:
          //return require("@/assets/images/icons/map-marker-online.svg");
        }
      } catch (e) {
        return null;
      }
    },
    openWindow() {
      this.window_open = true;
    },
  },

  created() {
    this. loadPABX();
    this.totalVehicles();
    this.loadCompanies();
  },
};
</script>
