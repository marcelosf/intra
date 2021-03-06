export default {

    data() {

        return {

            resource: this.$resource('manutencao{/query}{/id}{/item}'),

        }

    },

    methods: {

        queryResource() {

            return this.resource.query('manutencao');

        },

        getResource(id) {

            return this.resource.get({query: 'show', id: id, item: ''});

        },

        maintenenceResource() {

            return this.resource;

        },

        updateOrder(id, item) {

            return this.resource.update({query: 'solicitacao', id: id}, item);

        },

        updateResource(item) {

            return this.$http.update('manutencao/update', item);

        },

        deleteResource() {

            return this.$http.delete('manutencao/delete/:id');

        },

        solicitacaoOss(solicitacao) {

            return this.resource.query({query: 'solicitacao', id: solicitacao, item: 'oss'});

        },

        osEpis(os) {

            return this.resource.query({query: 'os', id: os, item: 'epis' });

        },

        resourceEpis() {

            return this.resource.query({query: 'epi'});

        },

        manutencaoOsTecnicos(os) {

            return this.resource.query({query: 'os', id: os, item: 'tecnicos'});

        },

        maintenenceTechArea() {

            return this.resource.query({query: 'tecnica'});

        }

    }

}