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

        created() {

            this.getEpis();

        },

        data() {

            return {

                epiItems: [],

                epis: []

            }

        },

        methods: {

            getEpis() {

                this.osEpis(this.os).then((response) => {

                    this.epis = response.data;

                });

            }

        }

    }

</script>