<template>

    <div>



            <div>

                <md-toolbar>

                    <md-button class="md-icon-button" @click="toggleSideNav">

                        <md-icon>menu</md-icon>

                    </md-button>

                    <h2 class="md-title">INTRANET</h2>

                </md-toolbar>

                <md-sidenav class="md-left" ref="sidenav" @toggle="toggle" @close="close('Left')">

                    <md-toolbar class="md-large">

                        <div class="md-toolbar-container">

                            <h3 class="md-title">Sidenav content</h3>

                        </div>

                    </md-toolbar>

                    <p>Side</p>

                </md-sidenav>

            </div>



    </div>

</template>

<script>

    export default{

        created() {

            console.log('Home created');

        },

        data(){
            return{
                msg:'hello vue'
            }
        },

        methods: {

            toggleSideNav() {

                console.log('toggled');

                this.$refs.sidenav.toggle();

            }

        }
    }
</script>
