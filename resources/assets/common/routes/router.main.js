import HomeComponent from '../../modules/home/js/components/Home.vue';
import {HomeRoutes} from '../../modules/home/js/route/router.map';

let routerRegister = [];

let children = routerRegister.concat(

    HomeRoutes

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