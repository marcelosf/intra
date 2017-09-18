export default {

    data() {

        return {

            resource: this.$resource('manutencao{/query}{/id}')

        }

    },

    methods: {

        queryResource() {

            return this.resource.query('manutencao');

        },

        getResource(id) {

            return this.resource.get({query: 'show', id: id});

        },

        saveResource(item) {

            return this.$http.save(item);

        },

        updateResource(item) {

            return this.$http.update('manutencao/update', item);

        },

        deleteResource() {

            return this.$http.delete('manutencao/delete/:id');

        }

    }

}