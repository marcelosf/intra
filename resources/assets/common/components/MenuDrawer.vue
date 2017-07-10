<template>

    <div>

        <div class="list no-border platform-delimiter">

            <q-drawer-link v-for="item in menuItems" :icon="item.icon" :to="{name: [item.link]}">

                {{ item.text }}

            </q-drawer-link>

        </div>

    </div>

</template>

<script>

    export default {

        data() {

            return {

                menuItems: [

                    {icon: 'account_balance', text: 'Diretoria'},
                    {icon: 'school', text: 'Colegiados'},
                    {icon: 'send', text: 'Comissões'},
                    {icon: 'email', text: 'E-mail'},
                    {icon: 'computer', text: 'Suporte'},
                    {icon: 'build', text: 'Serviços'},
                    {icon: 'book', text: 'Normas'},
                    {icon: 'send', text: 'CCE'},
                    {icon: 'photo_camera', text: 'Imagens'},
                    {icon: 'perm_identity', text: 'Comunidade'},
                    {icon: 'send', text: 'ASIAG'},


                ]

            }

        }

    }

</script>