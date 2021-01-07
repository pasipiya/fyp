import TestAdminView from './components/client/TestComponent.vue'


import ClientDashboard from './components/client/DashboardComponent.vue'
import ClientDepartment from './components/client/DepartmentComponent.vue'
import ClientEmployee from './components/client/EmployeeComponent.vue'
import VehicleParameters from './components/client/VehicleParametersComponent.vue'

import ManageVehicles from './components/client/ManageVehiclesComponent.vue'
import VehicleInspection from './components/client/VehicleInspectionComponent.vue'
import GeneralSettings from './components/client/GeneralSettingsComponent.vue'


export const routes = [
    {
        path:'/',
        component:ClientDashboard
    },
    {
        path:'/client_department',
        component:ClientDepartment
    },
    {
        path:'/client_employee',
        component:ClientEmployee
    },
    {
        path:'/vehicle_parameters/:id',
        name:'vehicle_parameters',
        component:VehicleParameters
    },
    {
        path:'/test_admin_view',
        component:TestAdminView
    },

    //Vehicles
    {
        path:'/manage_vehicles',
        component:ManageVehicles
    },
    {
        path:'/vehicle_inspection',
        component:VehicleInspection
    },
    //settings
    {
        path:'/general_settings',
        component:GeneralSettings
    },

];
