import TestAdminView from './components/client/TestComponent.vue'

//Admin
import AdminDashboard from './components/admin/AdminDashboardComponent.vue'
import AdminCompanyDetails from './components/admin/CompanyDetailsComponent.vue'
import AdminChat from './components/admin/AdminChatComponent.vue'
import AccidentHotSpots from './components/admin/AccidentHotSpotsComponent.vue'



//unauthorizedAccess
import unauthorizedAccess from './components/auth/unauthorizedAccessComponent.vue'


//Client
import ClientDashboard from './components/client/DashboardComponent.vue'
import ClientDepartment from './components/client/DepartmentComponent.vue'
import ClientEmployee from './components/client/EmployeeComponent.vue'
import VehicleParameters from './components/client/VehicleParametersComponent.vue'

import ManageVehicles from './components/client/ManageVehiclesComponent.vue'
import VehicleInspection from './components/client/VehicleInspectionComponent.vue'
import GeneralSettings from './components/client/GeneralSettingsComponent.vue'
import Employee from './components/client/EmployeeComponent.vue'
import ClientProfile from './components/client/ProfileComponent.vue'


//Soft PABX
import PABXNumbers from './components/client/PABXNumbersComponent.vue'
import axios from 'axios'


export const routes = [

    //Auth
    {
        path:'/unauthorizedAccess',
        component:unauthorizedAccess,
        name:'unauthorizedAccess'

    },

    {
        path:'/',
        beforeEnter:(to, from, next) => {
            axios.get('adminAuthenticated').then(()=>{
                return next({name: 'AdminDashboard'})
            }).catch(()=>{
                return next({name: 'ClientDashboard'})
            })
          }
    },

    //Admin
    {
        path:'/AdminDashboard',
        component:AdminDashboard,
        name:'AdminDashboard',
        beforeEnter:(to, from, next) => {
            axios.get('adminAuthenticated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'unauthorizedAccess'})
            })
          }
    },

    {
        path:'/admin_company_details',
        component:AdminCompanyDetails,
        beforeEnter:(to, from, next) => {
            axios.get('adminAuthenticated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'unauthorizedAccess'})
            })
          }

    },

        {
            path:'/accident_hot_spots',
            component:AccidentHotSpots,
            name:'AccidentHotSpots',
            beforeEnter:(to, from, next) => {
                axios.get('adminAuthenticated').then(()=>{
                    next()
                }).catch(()=>{
                    return next({name: 'unauthorizedAccess'})
                })
              }
        },

    {
        path:'/admin_chat',
        component:AdminChat,
        beforeEnter:(to, from, next) => {
            axios.get('adminAuthenticated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'unauthorizedAccess'})
            })
          }

    },








    //Client

    {
        path:'/ClientDashboard',
        component:ClientDashboard,
        name:'ClientDashboard',
        beforeEnter:(to, from, next) => {
            axios.get('clientAuthenticated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'unauthorizedAccess'})
            })
          }

    },


    {
        path:'/client_department',
        component:ClientDepartment,
        beforeEnter:(to, from, next) => {
            axios.get('clientAuthenticated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'unauthorizedAccess'})
            })
          }
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

    //Users
    {
        path:'/employee',
        component:Employee
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

    {
        path:'/PABXnumbers',
        component:PABXNumbers
    },

    //settings
    {
        path:'/general_settings',
        component:GeneralSettings
    },

    //Profile
    {
        path:'/profile',
        component:ClientProfile
    }
];
