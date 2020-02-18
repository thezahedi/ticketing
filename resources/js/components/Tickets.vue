<template>
    <div class="card">
        <div class="card-header">Tickets</div>
        <div class="card-body">
            <ul class="list-unstyled">
                <router-link :to="{name:'#showTicket',params:{id: ticket.id}}" v-for="ticket in tickets" key="ticket.id">
                    {{ ticket.title }}
                </router-link>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tickets: []
            }
        },
        mounted() {
            this.tickets = [
                {
                    id: 1,
                    title: "Ticket one",
                },
                {
                    id: 2,
                    title: "Ticket two",
                },
                {
                    id: 3,
                    title: "Ticket three",
                }
            ]
        }
    }
</script>
