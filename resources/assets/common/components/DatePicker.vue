<template>

       <v-menu
               lazy
               :close-on-content-click="false"
               v-model="menu"
               transition="scale-transition"
               offset-y
               full-width
               :nudge-left="40"
               max-width="290px"
       >
           <v-text-field
                   slot="activator"
                   :label="fieldTitle"
                   v-model="formatted"
                   prepend-icon="event"
                   readonly
           ></v-text-field>
           <v-date-picker
                   v-model="date"
                   scrollable
                   actions
                   no-title
                   :locale="locale"
                   :date-format="dateFormat"
                   :formatted-value.sync="formatted"
           >
               <template scope="{ save, cancel }">
                   <v-card-actions>
                       <v-btn flat primary @click.native="cancel()">Cancelar</v-btn>
                       <v-btn flat primary @click.native="save()">Ok</v-btn>
                   </v-card-actions>
               </template>
           </v-date-picker>
       </v-menu>

</template>

<script>

    export default {

        props: ['fieldTitle', 'os'],

        data() {

            return {

                date: null,

                menu: false,

                locale: 'pt-br',

                formatted: null

            }

        },

        watch: {

            os () {

                this.$emit('loaded', this.date);

                console.log('date-loaded');

            }

        },

        methods: {

            dateFormat (value) {

                return  moment(value, moment.ISO_8601).format('DD/MM/YYYY');

            }

        }

    }

</script>