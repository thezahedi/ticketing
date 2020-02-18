<template>
    <div class="card">
        <div class="card-header">{{ unit.name }}</div>
        <div class="card-body">
            {{ unit.name }}
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                unitId: 0,
                unit: {}
            }
        },
        mounted() {
            this.unitId = this.$route.params.id;
            axios.get('/api/units/' + this.unitId).then(res => {
                this.unit = res.data.data;
            }).catch(console.error);
        }
    }
</script>
