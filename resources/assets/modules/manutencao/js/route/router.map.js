import MaintenenceIndex from '../components/MaintenenceIndex.vue';
import MaintenenceCreate from '../components/MaintenenceCreate.vue';
import MaintenenceEdit from '../components/MaintenenceEdit.vue';
import MaintenenceShow from '../components/MaintenenceShow.vue';

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

    },

    {

        path: 'servico/manutencao/editar/:id',
        name: 'maintenence.edit',
        meta: {requireAuth: false, title: 'Manutenção'},
        component:MaintenenceEdit

    },

    {

        path: 'servico/manutencao/mostrar/:id',
        name: 'maintenence.show',
        meta: {requireAuth: false, title: 'Manutenção'},
        component: MaintenenceShow

    }

];