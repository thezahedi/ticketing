<template>
    <div class="card">
        <h1>{{ ticket.title }}</h1>
        <p>{{ ticket.content }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ticketId: 0,
                ticket: {}
            }
        },
        mounted() {
            this.ticketId = this.$route.params.id;
            this.ticket = {
                id: this.ticketId,
                title: "Ticket show  " + this.ticketId,
                content: "Show content of ticket",
            }
        }
    }
</script>
