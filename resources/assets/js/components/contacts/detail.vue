<template>
    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

        <div class="dashhead bg-light b-b">
            <section class="row pb5 mb20">
                <h1>{{ contact.organisation }}
                    <small v-if="contact.organisation.length">Organisation</small>
                    <small v-else>Private Person</small>
                </h1>
            </section>
        </div>

    </div>
</template>
<script>
    export default {
        name: 'Detail',

        route: {
            data: function (transition) {
                setTimeout(function () {
                    transition.next()
                }, 1000)
            }
        },

        data: function () {
            return {
                contact:this.getContactDetails()
            }
        },

        ready: function () {
            this.getContactDetails()
        },

        methods: {
            getContactDetails(){
                // GET request
                this.$http({url: '/api/crm/detail/id/' + this.$route.params.id, method: 'GET'}).then(function (response) {
                    this.$set('contact', response.data)
                }, function (response) {
                    console.log(response.data)
                });
            },
        }

    }
</script>