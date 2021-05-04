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
            <h1 class="m-0 text-dark">Accident Hot Spots</h1>
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
            <gmap-map
              :center="{ lat: 7.290871, lng: 80.296412 }"
              :zoom="7"
              style="width: 100%; height: 400px"
            >
            <gmap-marker
                v-for="(m, index) in spotsData"
                :key="index"
                :position="m.position"
                :clickable="true"
                :icon="icon"

              ></gmap-marker>

            </gmap-map>
          </div>
        </div>

        <!--Form -->
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Accident Hot Spots</h4>
              </div>
              <div class="card-body">

                  <div class="form-group">
                    <label>File</label>
                    <input
                      required
                      type="file"
                      class="form-control"
                      :class="{ ' is-invalid': error.message }"
                      id="input-file-import"
                      name="file_import"
                      ref="import_file"
                      @change="onFileChange"
                    />
                    <div v-if="error.message" class="invalid-feedback"></div>
                  </div>


                  <button v-on:click="proceedAction()" type="submit" class="btn btn-success">Submit</button>

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
      error: {},
      import_file: "",
      spotsData:[],
       //icon: this.getSiteIcon(4),
       icon:''


    };
  },
  methods: {
    onFileChange(e) {
      this.import_file = e.target.files[0];
    },

    getSpots(){
         let uri = "submit_accident_hot_spots";
        axios.get(uri).then((response) => {
        this.spotsData = response.data;
        console.log(this.spotsData);
      });
    },

    proceedAction() {
        this.$Progress.start();
      let formData = new FormData();
      formData.append("import_file", this.import_file);
    formData.append("test", this.test);
      axios
        .post("/submit_accident_hot_spots", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then(function (response) {
            if (response.status === 200) {
            this.$toaster.success("Accident hot spots added successfully.");

            this.$Progress.finish();
            //console.log(response);
            // codes here after the file is upload successfully
          }
          //console.log("SUCCESS!!");
        })
        .catch(function () {
          console.log("FAILURE!!");
            this.uploading = false;
          this.error = error.response.data;
          //console.log("check error: ", this.error);
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
            //return require("../assets/images/icons/map-marker-lifesafety.svg");
            break;
          default:
          //return require("../assets/images/icons/map-marker-online.svg");
        }
      } catch (e) {
        return null;
      }
    },
  },

  created() {
      this.getSpots()
  },
};
</script>
