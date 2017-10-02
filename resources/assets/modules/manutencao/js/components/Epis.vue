<template>

    <v-select
            label=""
            v-bind:items="epiItems"
            v-model="epis"
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

            this.getEpis();

            this.getEpisItems();

        },

        data() {

            return {

                epiItems: [],

                epis: []

            }

        },

        methods: {

            getEpis() {

                if(this.os) {

                    this.osEpis(this.os).then((response) => {

                        console.log(response.data);

                        this.epis = response.data;

                    });

                }

            },

            getEpisItems() {

                this.resourceEpis().then((response) => {

                    this.epiItems = response.data.epis;

                });

            }

        }

    }

</script>