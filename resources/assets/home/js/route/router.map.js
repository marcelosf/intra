import HomeComponent from '../components/Home.vue';
import HomedComponent from '../components/Homed.vue';
import DirectoryComponent from '../components/Directory.vue';
import CollegiateComponent from '../components/Collegiate.vue';
import EmailComponent from '../components/Email.vue';
import ServicesComponent from '../components/Services.vue';
import ImagesComponent from '../components/Images.vue';
import SupportComponent from '../components/Support.vue';

export default {

    routes: [

        {

            path: '/',
            name: 'home.index',
            component: HomeComponent,
            children: [

                {

                    path: 'directory',
                    name: 'home.directory',
                    component: DirectoryComponent

                },

                {

                    path: 'collegiate',
                    name: 'home.collegiate',
                    component: CollegiateComponent

                },

                {

                    path: 'email',
                    name: 'home.email',
                    component: EmailComponent

                },

                {

                    path: 'services',
                    name: 'home.services',
                    component: ServicesComponent

                },

                {

                    path: 'support',
                    name: 'home.support',
                    component: SupportComponent

                },

                {

                    path: 'images',
                    name: 'home.images',
                    component: ImagesComponent

                }

            ]

        }

    ]

}