<template>

    <v-select
            v-bind:items="technitianItems"
            v-model="technitians"
            multiple
            chips
    ></v-select>

</template>


<script>

    import resourceMixins from '../mixins/resourceMixins';
    import userResource from '../../../user/js/mixins/resourceMixins';

    export default{

        props: ['os'],

        mixins: [resourceMixins, userResource],

        created() {

            this.getTechList();

        },

        data() {

            return {

                technitians: [],

                technitianItems: []

            }

        },

        watch: {

            os() {

                if (this.os) {

                    this.manutencaoOsTecnicos(this.os).then((response) => {

                        let i, data = response.data.tecnicos, items = [];

                        for (i in data) {

                            items.push(data[i].id);

                        }

                        this.technitians = items;

                    });

                }

            }

        },

        methods: {

            getTechList() {

                this.users().then((response) => {

                    let i, items = [], data = response.data;

                    for (i in data) {

                        let obj = {text: data[i].name, value: data[i].id};

                        items.push(obj);

                    }

                    this.technitianItems = items;

                });

            }

        }

    }
</script>