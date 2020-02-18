<template>
    <div class="card">
        <div class="card-header">User management</div>
        <div class="card-body">
            <router-link :to="{name:'#showUser',params:{id: user.id}}" v-for="user in users" :key="user.id">
                {{ user.name }} - {{ user.email }}<br>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: []
            }
        },
        mounted() {
            axios.get('/api/users').then(res => {
                this.users = res.data.data;
            }).catch(console.error);
        }
    }
</script>
