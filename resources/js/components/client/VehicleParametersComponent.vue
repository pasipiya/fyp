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
            <h1 class="m-0 text-dark">Vehicle Data</h1>
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
          <div class="col-md-6 d-flex justify-content-center">
            <radial-gauge
              id="gaugeSpeed"
              :value="speed_data"
              :options="speedOptions"
            ></radial-gauge>
          </div>
          <div class="col-md-6 d-flex justify-content-center">
            <radial-gauge
              id="gaugeRPM"
              :value="rpm_data"
              :options="RPMOptions"
            ></radial-gauge>
          </div>
        </div>
        <div class="row">
            <highcharts :options="chartOptions"></highcharts>
        </div>
        <div class="row">
            <GChart
      type="BubbleChart"
      :data="chartData"
      :options="chartOptions"
      style="width: 900px; height: 500px;"
    />
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
import LinearGauge from "vue-canvas-gauges/src/LinearGauge";
import RadialGauge from "vue-canvas-gauges/src/RadialGauge";
import { GChart } from "vue-google-charts";

export default {
  components: {
    LinearGauge,
    RadialGauge,
    GChart,

    //   'radial-gauge':RadialGauge,
    //    'radial-gauge':RadialGauge,
  },
  data() {
    return {

      sound1: "sounds/industrial_alarm.mp3",
      soundurl:
        "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3",
      vehicle_id: 0,
      speed_data: 0,
      rpm_data: 0,
      vehicleData: [],


       chartData: [
        ["ID", "X", "Y", "Temperature"],
        ["", 80, 167, 120],
        ["", 79, 136, 130],
        ["", 78, 184, 50],
        ["", 72, 278, 230],
        ["", 81, 200, 210],
        ["", 72, 170, 100],
        ["", 68, 477, 80]
      ],
      chartOptions: {
        colorAxis: { colors: ["yellow", "red"] }
      }
    };
  },

  methods: {
    allowNotifications(sound) {
      console.log(Notification.permission);
      if (Notification.permission === "granted") {
        alert("we have permission");
        if (sound) {
          var audio = new Audio(sound);
          //audio.play();
        }
      } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then((permission) => {
          console.log(permission);
        });
      }
    },

    loadPerVehicleData() {
      let uri = "get_vehicle_param/" + this.vehicle_id;
      axios.get(uri).then((response) => {
        //console.log(response.data[0].speed);
        this.speed_data = parseInt(response.data[0].speed);
        this.rpm_data = parseInt(response.data[0].rpm);
        console.log(response.data[0]);
        //console.log(this.rpm_data)
      });
    },
    activate() {
      setInterval(() => this.speed(), 4000);
    },
  },

  props: {
    value: {
      type: Number,
      Required: true,
    },
    speedOptions: {
      type: Object,
      default: () => ({
        renderTo: "gaugeSpeed",
        width: 350,
        height: 350,
        units: "km/h",
        minValue: 0,
        maxValue: 220,
        majorTicks: [
          "0",
          "20",
          "40",
          "60",
          "80",
          "100",
          "120",
          "140",
          "160",
          "180",
          "200",
          "220",
        ],
        minorTicks: 2,
        strokeTicks: false,
        highlights: [
          { from: 0, to: 50, color: "rgba(0,255,0,.15)" },
          { from: 50, to: 100, color: "rgba(255,255,0,.15)" },
          { from: 100, to: 150, color: "rgba(0,0,255,.25)" },
          // { from: 150, to: 200, color: 'rgba(255,0,225,.25)' },
          { from: 150, to: 220, color: "rgba(255,30,0,.25)" },
        ],
        colorPlate: "#222",
        colorMajorTicks: "#f5f5f5",
        colorMinorTicks: "#ddd",
        colorTitle: "#fff",
        colorUnits: "#ccc",
        colorNumbers: "#eee",
        colorNeedle: "rgba(240, 128, 128, 1)",
        colorNeedleEnd: "rgba(255, 160, 122, .9)",
        valueBox: true,
        animationRule: "bounce",
        animationDuration: 500,
      }),
    },
    RPMOptions: {
      type: Object,
      default: () => ({
        renderTo: "gaugeRPM",
        width: 350,
        height: 350,
        units: "RPM",
        title: false,
        minValue: 0,
        maxValue: 6000,
        majorTicks: [
          //'0','20','40','60','80','100','120','140','160','180','200','220'
          //'0','100','200','300','400','500','600','700','800','900','1000','1100','1200','1300','1400','1500','1600','1700','1800','1900','2000'
          "0",
          "600",
          "800",
          "1000",
          "1500",
          "2000",
          "3000",
          "4000",
          "5000",
          "6000",
        ],
        minorTicks: 2,
        strokeTicks: false,
        highlights: [
          { from: 0, to: 1000, color: "rgba(0,255,0,.15)" },
          { from: 1000, to: 2000, color: "rgba(255,255,0,.15)" },
          { from: 2000, to: 3000, color: "rgba(0,0,255,.25)" },
          { from: 3000, to: 4000, color: "rgba(255,0,225,.25)" },
          { from: 4000, to: 6000, color: "rgba(255,30,0,.25)" },
        ],
        colorPlate: "#222",
        colorMajorTicks: "#f5f5f5",
        colorMinorTicks: "#ddd",
        colorTitle: "#fff",
        colorUnits: "#ccc",
        colorNumbers: "#eee",
        colorNeedle: "rgba(240, 128, 128, 1)",
        colorNeedleEnd: "rgba(255, 160, 122, .9)",
        valueBox: true,
        animationRule: "bounce",
        animationDuration: 500,
      }),
    },


  },
  created() {
    //this.allowNotifications(this.sound1);
    this.vehicle_id = this.$route.params.id;
    this.loadPerVehicleData();
    this.obj = setInterval(() => this.loadPerVehicleData(), 10000);
  },

  destroyed() {
    clearInterval(this.obj);
    console.log("Component destroyed.");
  },
};
</script>
