import MaintenenceIndex from '../components/MaintenenceIndex.vue';


export const MaintenenceRoutes = [

    {

        path: 'manutencao',
        name: 'manutencao.index',
        meta: {requireAuth: false},
        component: MaintenenceIndex

    }

];