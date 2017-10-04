export default {

    data() {

        return {

            userResource: this.$resource('usuario{/query}{/id}{/item}'),

        }

    },

    methods: {

        users() {

            return this.userResource.query();

        }

    }

}