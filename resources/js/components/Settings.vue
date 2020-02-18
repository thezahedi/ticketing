<template>
    <div class="card">
        <div class="card-header">Settings</div>
        <div class="card-body">
            <router-link :to="{name:'#users'}">User management</router-link>
            <br>
            <router-link :to="{name:'#units'}">Unit management</router-link>
            <br>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Settings mounted.');
        }
    }
</script>
