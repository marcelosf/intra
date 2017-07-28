<template>

    <p>Efutuando Logout</p>

</template>

<script>

    import Auth from '../../../../common/services/auth';

    export default {

        created () {

            Auth.logout();

        }

    }

</script>