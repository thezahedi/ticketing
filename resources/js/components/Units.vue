<template>
    <div class="card">
        <div class="card-header">User management</div>
        <div class="card-body">
            <ul class="list-unstyled">
                <router-link :to="{name:'#showUnit',params:{id: unit.id}}" v-for="unit in units" :key="unit.id">
                    <li>{{ unit.name }}</li>
                </router-link>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                units: []
            }
        },
        mounted() {
            axios.get('/api/units').then(res => {
                this.units = res.data.data;
            }).catch(console.error);
        }
    }
</script>
