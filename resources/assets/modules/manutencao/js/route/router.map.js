import MaintenenceIndex from '../components/MaintenenceIndex.vue';
import MaintenenceCreate from '../components/MaintenenceCreate.vue';

export const MaintenenceRoutes = [

    {

        path: 'servico/manutencao',
        name: 'maintenence.index',
        meta: {requireAuth: false, title: 'Manutenção'},
        component: MaintenenceIndex

    },

    {

        path: 'servico/manutencao/novo',
        name: 'maintenence.new',
        meta: {requireAuth: false, title: 'Manutenção'},
        component: MaintenenceCreate

    }

];