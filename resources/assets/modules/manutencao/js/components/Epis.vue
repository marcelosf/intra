<template>

    <v-select
            label=""
            v-bind:items="epiItems"
            v-model="epis"
            :async-loading="loading"
            multiple
            chips
    ></v-select>

</template>

<script>

    import resourceMixins from "../mixins/resourceMixins";

    export default {

        props: ['os'],

        mixins: [resourceMixins],

        created() {

            this.getEpisItems();

        },

        data() {

            return {

                epiList: {},

                epiItems: [],

                epis: [],

                loading: false

            }

        },

        watch: {

            os() {

                if (this.os) {

                    this.osEpis(this.os).then((response) => {

                        let items = [], i, data = response.data;

                        for (i in data) {

                            items.push(data[i].id);

                        }

                        this.epis = items;

                    });

                }

            }

        },


        methods: {

            getEpisItems() {

                this.resourceEpis().then((response) => {

                    let items = [], i, data = response.data.epis;

                    for (i in data) {

                        let obj = {};

                        obj.text = data[i].equipamento;

                        obj.value = data[i].id;

                        items.push(obj);

                    }

                    this.epiItems = items;

                });

            }

        }

    }

</script>