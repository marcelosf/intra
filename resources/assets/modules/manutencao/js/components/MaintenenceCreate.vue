<template>

    <v-container grid-list-xs>

        <v-card class="pa-5">

            <v-card-title>

                <h6>Novo Chamado</h6>

            </v-card-title>

            <v-card-text>

                <v-select

                    label="Responsável"
                    v-bind:items="responsibleItems"
                    v-model="responsible"
                    max-height="400"
                    hint="Informe o responsável pelo serviço"
                    persistent-hint
                    :class="spacing"

                ></v-select>

                <v-select

                        label="Serviço"
                        v-bind:items="serviceItems"
                        v-model="services"
                        max-height="400"
                        hint="Informe o tipo de serviço"
                        persistent-hint
                        multiple
                        chips
                        :class="spacing"

                ></v-select>

                <v-select

                        label="Local"
                        v-bind:items="localItems"
                        v-model="local"
                        hint="Informe o local onde será executado o serviço"
                        persistent-hint
                        autocomplete
                        :class="spacing"

                ></v-select>

                <v-text-field

                        label="Observações"
                        name="observation"
                        multi-line

                ></v-text-field>

                <v-btn primary>Enviar</v-btn>

            </v-card-text>

        </v-card>

    </v-container>

</template>

<script>

    export default {

        data() {

            return {

                spacing: 'mb-4',

                responsibleItems: [

                    {value: 1, text: 'Marcelo'},
                    {value: 2, text: 'Schneider'},
                    {value: 3, text: 'Fialho'},
                    {value: 4, text: 'Marcelo Schneider'},
                    {value: 5, text: 'Marcelo Fialho'},

                ],

                serviceItems: [

                    {value: 1, text: 'Marcelo'},
                    {value: 2, text: 'Schneider'},
                    {value: 3, text: 'Fialho'},
                    {value: 4, text: 'Marcelo Schneider'},
                    {value: 5, text: 'Marcelo Fialho'},

                ],

                localItems: [

                    {value: 1, text: 'Marcelo'},
                    {value: 2, text: 'Schneider'},
                    {value: 3, text: 'Fialho'},
                    {value: 4, text: 'Marcelo Schneider'},
                    {value: 5, text: 'Marcelo Fialho'},

                ]

            };

        }


    }

</script>