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
                        <h1 class="m-0 text-dark">Manage Vehicles</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Manage Vehicles</li>
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
                    <div class="col-md-12">
                        <div class="card card-light">
                            <div class="card-header">
                                <h4>Manage Vehicles</h4>
                                <div class="card-header-action">
                                    <button
                                        class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#addNew"
                                        @click="openModalWindow"
                                    >
                                        Add New <i class="fas fa-car fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                    <div class="table-responsive">
                                <table style="margin-bottom:50px" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Vehicle ID</th>
                                            <th>Vehicle Manufacture</th>
                                            <th>Vehicle Engine Type</th>
                                            <th>Vehicle Model</th>
                                            <th>Vehicle Horse Power</th>
                                            <th>Vehicle Type</th>
                                            <th>Vehicle Color</th>
                                            <th>Vehicle Year</th>
                                            <th>Average (Miles per Gallon)</th>
                                            <th>License Plate</th>
                                            <th>Initial Mileage</th>
                                            <th>Licence Expiry Date</th>
                                            <th>Insurance Expiry Date</th>
                                            <th>OBD II MAC Address</th>
                                            <th>GPS Model</th>
                                            <th>Vehicle Status</th>
                                            <th>Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(vehicle, index) in vehicles"
                                            :key="index"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ vehicle._id.$oid}}</td>
                                            <td>
                                                {{
                                                    vehicle.vehicle_manufacture
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    vehicle.vehicle_engine_type
                                                }}
                                            </td>
                                            <td>{{ vehicle.vehicle_model }}</td>
                                            <td>
                                                {{
                                                    vehicle.vehicle_horse_power
                                                }}
                                            </td>
                                            <td>{{ vehicle.vehicle_type }}</td>
                                            <td>{{ vehicle.vehicle_color }}</td>
                                            <td>{{ vehicle.vehicle_year }}</td>
                                            <td>
                                                {{
                                                    vehicle.vehicle_avarage_fuel
                                                }}
                                            </td>
                                            <td>{{ vehicle.license_plate }}</td>
                                            <td>
                                                {{
                                                    vehicle.vehicle_initial_mileage
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    vehicle.license_expiry_date
                                                }}
                                            </td>
                                            <td>
                                                {{
                                                    vehicle.insurance_expiry_date
                                                }}
                                            </td>
                                            <td>
                                                {{ vehicle.vehicle_obd_mac }}
                                            </td>
                                            <td>
                                                {{ vehicle.vehicle_gps_model }}
                                            </td>

                                            <td>
                                                {{ vehicle.vehicle_in_service }}
                                            </td>

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
                                                     <a
                                                            class="dropdown-item"
                                                            href="#"
                                                            @click="
                                                                view_vehicle(
                                                                    vehicle._id
                                                                        .$oid
                                                                )
                                                            "
                                                            >View
                                                        </a>
                                                         <a
                                                            class="dropdown-item"
                                                            href="#"
                                                            @click="
                                                                edit_vehicle(
                                                                    vehicle._id
                                                                        .$oid
                                                                )
                                                            "
                                                            >Edit
                                                        </a>
                                                        <a
                                                            class="dropdown-item"
                                                            href="#"
                                                            @click="
                                                                delete_vehicle(
                                                                    vehicle._id
                                                                        .$oid
                                                                )
                                                            "
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
                        </div>
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
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5
                                    v-show="!editMode"
                                    class="modal-title"
                                    id="addNewLabel"
                                >
                                    Add New Vehicle
                                </h5>
                                <h5
                                    v-show="editMode"
                                    class="modal-title"
                                    id="addNewLabel"
                                >
                                    Update User
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

                            <form enctype="multipart/form-data"
                                @submit.prevent="
                                    editMode ? updateVehicle() : createVehicle()
                                "
                            >
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >Vehicle Manufacture</label
                                                >
                                                <select
                                                    name="vehicle_manufacture"
                                                    v-model="
                                                        form.vehicle_manufacture
                                                    "
                                                    id="vehicle_manufacture"
                                                    class="form-control"
                                                >
                                                    <option value="Tata"
                                                        >Tata</option
                                                    >
                                                    <option value="Toyota"
                                                        >Toyota</option
                                                    >
                                                    <option value="Suzuki"
                                                        >Suzuki</option
                                                    >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >Vehicle Engine Type</label
                                                >
                                                <input
                                                    v-model="
                                                        form.vehicle_engine_type
                                                    "
                                                    type="text"
                                                    name="vehicle_engine_type"
                                                    id="vehicle_engine_type"
                                                    placeholder="Vehicle Engine Type"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Model</label>
                                                <input
                                                    v-model="form.vehicle_model"
                                                    type="text"
                                                    name="vehicle_model"
                                                    id="vehicle_model"
                                                    placeholder="Vehicle Model"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >Vehicle Horse Power</label
                                                >
                                                <input
                                                    v-model="
                                                        form.vehicle_horse_power
                                                    "
                                                    type="number"
                                                    min="0"
                                                    name="vehicle_horse_power"
                                                    id="vehicle_horse_power"
                                                    placeholder="Vehicle Horse Power"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Type</label>
                                                <select
                                                    name="vehicle_type"
                                                    v-model="form.vehicle_type"
                                                    id="vehicle_type"
                                                    class="form-control"
                                                >
                                                    <option value="Hatchback"
                                                        >Hatchback</option
                                                    >
                                                    <option value="Sedan"
                                                        >Sedan</option
                                                    >
                                                    <option value="Mini van"
                                                        >Mini van</option
                                                    >
                                                    <option value="Saloon"
                                                        >Saloon</option
                                                    >

                                                    <option value="SUV"
                                                        >SUV</option
                                                    >
                                                    <option value="Bus"
                                                        >Bus</option
                                                    >
                                                    <option value="Truck"
                                                        >Truck</option
                                                    >
                                                    <option value="Lorry"
                                                        >Lorry</option
                                                    >
                                                    <option value="Jeep"
                                                        >Jeep</option
                                                    >
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Color</label>
                                                <input
                                                    v-model="form.vehicle_color"
                                                    type="text"
                                                    name="vehicle_color"
                                                    id="vehicle_color"
                                                    placeholder="Vehicle Color"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Year</label>
                                                <input
                                                    v-model="form.vehicle_year"
                                                    type="text"
                                                    name="vehicle_year"
                                                    id="vehicle_year"
                                                    placeholder="Vehicle Year"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >Average (Miles per
                                                    Gallon)</label
                                                >
                                                <input
                                                    v-model="
                                                        form.vehicle_avarage_fuel
                                                    "
                                                    type="number"
                                                    name="vehicle_avarage_fuel"
                                                    id="vehicle_avarage_fuel"
                                                    placeholder="Average (Miles per Gallon)"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>License Plate</label>
                                                <input
                                                    v-model="form.license_plate"
                                                    type="text"
                                                    name="license_plate"
                                                    id="license_plate"
                                                    placeholder="License Plate"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Initial Mileage</label>
                                                <input
                                                    v-model="
                                                        form.vehicle_initial_mileage
                                                    "
                                                    type="number"
                                                    min="0"
                                                    name="vehicle_initial_mileage"
                                                    id="vehicle_initial_mileage"
                                                    placeholder="Initial Mileage"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >Licence Expiry Date</label
                                                >
                                                <date-picker
                                                    v-model="
                                                        form.license_expiry_date
                                                    "
                                                    name="license_expiry_date"
                                                    id="license_expiry_date"
                                                    required
                                                    :config="{
                                                        format: 'DD/MM/YYYY',
                                                        useCurrent: true
                                                    }"
                                                ></date-picker>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >Insurance Expiry
                                                    Date</label
                                                >
                                                <date-picker
                                                    v-model="
                                                        form.insurance_expiry_date
                                                    "
                                                    name="insurance_expiry_date"
                                                    id="insurance_expiry_date"
                                                    required
                                                    :config="{
                                                        format: 'DD/MM/YYYY',
                                                        useCurrent: true
                                                    }"
                                                ></date-picker>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    >OBD II MAC Address</label
                                                >
                                                <input
                                                    v-model="
                                                        form.vehicle_obd_mac
                                                    "
                                                    type="text"
                                                    name="vehicle_obd_mac"
                                                    id="vehicle_obd_mac"
                                                    placeholder="OBD II MAC Address"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>GPS Model</label>
                                                <input
                                                    v-model="
                                                        form.vehicle_gps_model
                                                    "
                                                    type="text"
                                                    name="vehicle_gps_model"
                                                    id="vehicle_gps_model"
                                                    placeholder="GPS Model"
                                                    required
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Image</label>
                                                <input
                                                    @change="onFileChange"
                                                    type="file"
                                                    name="vehicle_image"
                                                    id="vehicle_image"
                                                    placeholder="Vehicle Image"
                                                    class="form-control"

                                                />
                                            </div>
                                            <img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview"/>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="d-block"
                                                    >In Service</label
                                                >
                                                <div class="form-check">
                                                    <input
                                                        value="yes"
                                                        class="form-check-input"
                                                        type="radio"
                                                        v-model="
                                                            form.vehicle_in_service
                                                        "
                                                        name="vehicle_in_service"
                                                        id="vehicle_in_service"
                                                        checked=""
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                    >
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input
                                                        value="no"
                                                        class="form-check-input"
                                                        type="radio"
                                                        v-model="
                                                            form.vehicle_in_service
                                                        "
                                                        name="vehicle_in_service"
                                                        id="vehicle_in_service"
                                                        checked=""
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                    >
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                                    <!-- <button type="submit" class="btn btn-info">
                                        Update
                                    </button> -->
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    >
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--End Model-->

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
            editMode: false,
            vehicles: [],
            imagePreview: null,
            showPreview: false,
            form: new Form({
                id: "",
                vehicle_manufacture: "Choose Vehicle Manufacture",
                vehicle_name: "",
                vehicle_image: null,
            })
        };
    },
    methods: {
        onFileChange(event){
        this.form.vehicle_image = event.target.files[0];
        let reader  = new FileReader();
         reader.addEventListener("load", function () {
        this.showPreview = true;
        this.imagePreview = reader.result;
    }.bind(this), false);
     if( this.form.vehicle_image ){
        /*
            Ensure the file is an image file.
        */
        if ( /\.(jpe?g|png|gif)$/i.test( this.form.vehicle_image.name ) ) {

            console.log("here");
            /*
            Fire the readAsDataURL method which will read the file in and
            upon completion fire a 'load' event which we will listen to and
            display the image in the preview.
            */
            reader.readAsDataURL( this.form.vehicle_image );
        }
    }
},
        loadVehicles() {
            this.$Progress.start();
            let uri = "get_vehicles";
            axios.get(uri).then(response => {
                this.vehicles = response.data;
                console.log(this.vehicles);
                // this.vehicles = response.data.filter(d => d.vehicle_year === "2014");
                // console.log(this.vehicles);
            });
            this.$Progress.finish();

        },
        openModalWindow() {
            this.editMode = false;
            this.form.reset();
            $("#addNew").modal("show");
        },
        createVehicle() {

            this.$Progress.start();
            this.form
                .post("submit_vehicle")
                .then(() => {
                    this.$toaster.success("Vehicle created successfully.");

                    this.$Progress.finish();

                    $("#addNew").modal("hide");
                })
                .catch(() => {
                    console.log("Error......");
                });
            this.loadVehicles();
        },
        delete_vehicle(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    //Send Request to server
                    //this.form
                    //.get("delete_department/" + id)
                    axios
                        .get("delete_vehicle/" + id)
                        .then(response => {
                            Swal.fire(
                                "Deleted!",
                                "Vehicle deleted successfully",
                                "success"
                            );
                            this.loadVehicles();
                            console.log(response);
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!"
                                //footer: "<a href>Why do I have this issue?</a>",
                            });
                        });
                }
            });
        },
        updateDepartment() {}
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
        this.loadVehicles();

        //this.preloader();
        //this.$Progress.start();
        //this.$Progress.finish();
        //this.$toaster.success('Your toaster success message.')
        //  Toast.fire({
        //         icon: "success",
        //         title: "User updated successfully",
        //       });
        //Swal.fire('Any fool can use a computer')
    }
};
</script>
