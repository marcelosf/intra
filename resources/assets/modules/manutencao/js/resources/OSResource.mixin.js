export default {

    data () {

        return {

            osResource : this.$resource('manutencao/os{/query}{/id}{/item}'),

        }

    },


    methods: {

        getOSData(osId) {

            return this.osResource.get({id: osId});

        },

        updateOS(os, osId) {

            return this.osResource.update({query: 'update', id: osId}, os);

        }

    }

}