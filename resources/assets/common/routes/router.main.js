import HomeComponent from '../../modules/home/js/components/Home.vue';
import {HomeRoutes} from '../../modules/home/js/route/router.map';
import {MaintenenceRoutes} from "../../modules/manutencao/js/route/router.map";

let routerRegister = [];

let children = routerRegister.concat(

    HomeRoutes,

    MaintenenceRoutes

);

export default {

    routes: [

        {

            path: '/',
            name: 'home.index',
            meta: { requireAuth: false },
            component: HomeComponent,
            children: children


        }

    ]

}