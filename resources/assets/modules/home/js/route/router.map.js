import DirectoryComponent from '../components/Directory.vue';
import CollegiateComponent from '../components/Collegiate.vue';
import EmailComponent from '../components/Email.vue';
import ServicesComponent from '../components/Services.vue';
import ImagesComponent from '../components/Images.vue';
import SupportComponent from '../components/Support.vue';
import CommissionsComponent from '../components/Commisions.vue';
import CommunityComponent from '../components/Community.vue';
import CceComponent from '../components/Cce.vue';
import RolesComponent from '../components/Roles.vue';
import LogoutComponent from '../components/Logout.vue';
import userLoader from '../../../../common/services/userLoader';

export const HomeRoutes = [

    {

        path: 'diretoria',
        name: 'home.directory',
        meta: { requireAuth: true },
        component: DirectoryComponent,

    },

    {

        path: 'colegiados',
        name: 'home.collegiate',
        meta: { requireAuth: false },
        component: CollegiateComponent

    },

    {

        path: 'email',
        name: 'home.email',
        meta: { requireAuth: false },
        component: EmailComponent

    },

    {

        path: 'servico',
        name: 'home.services',
        meta: { requireAuth: false },
        component: ServicesComponent,

    },

    {

        path: 'suporte',
        name: 'home.support',
        meta: { requireAuth: false },
        component: SupportComponent

    },

    {

        path: 'imagens',
        name: 'home.images',
        meta: { requireAuth: false },
        component: ImagesComponent

    },

    {

        path: 'comissoes',
        name: 'home.commissions',
        meta: { requireAuth: false },
        component: CommissionsComponent

    },

    {

        path: 'comunidade',
        name: 'home.community',
        meta: { requireAuth: false },
        component: CommunityComponent

    },

    {

        path: 'cce',
        name: 'home.cce',
        meta: { requireAuth: false },
        component: CceComponent

    },

    {

        path: 'normas',
        name: 'home.roles',
        meta: { requireAuth: false },
        component: RolesComponent

    },

    {

        path: 'oauth-logout',
        name: 'oauth-logout',
        meta: { requireAuth: true },
        component: LogoutComponent

    },

    {

        path: 'oauth-callback',
        name: 'oauth-callback',
        meta: { requireAuth: false },
        beforeEnter: (to, from, next) => {

            userLoader.callbackHandle(to, next);

        }

    }

];