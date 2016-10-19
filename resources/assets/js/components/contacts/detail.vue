<template>
    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

        <div class="dashhead bg-light b-b">
            <section class="row pb5 mb20">
                <div class="half-column">
                    <h1>{{ contact.organisation }}
                        <small v-if="contact.organisation.length">Organisation</small>
                        <small v-else>Private Person</small>
                    </h1>
                </div>
                <div class="half-column">
                    <a href="#" onclick="window.history.back();" class="right icon-back">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                </div>
            </section>
        </div>

    </div>
</template>
<style lang="stylus">
@import "../../../stylus/variables";
.icon-back {
    font-size: 48px;
    color: primary-color;
    &:hover {
        color: blue-color;
     }
}
</style>
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