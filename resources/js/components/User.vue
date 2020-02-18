<template>
    <div class="card">
        <h1>{{ user.name }}</h1>
        <p>{{ user.email }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                userId: 0,
                user: {}
            }
        },
        mounted() {
            this.userId = this.$route.params.id;
            axios.get('/api/users/' + this.userId).then(res => {
                this.user = res.data.data;
            }).catch(console.error);
        }
    }
</script>
