<template>

<div>

    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

		<div class="dashhead bg-light b-b">
			<section class="row pb5 mb20">
				<h1>Dashboard</h1>
			</section>
		</div>

		<analytics v-if="tabAnalytics"></analytics>
		<sales v-if="tabSales"></sales>

	</div>

</div>

</template>
<script>

import Analytics from './analytics.vue';
import Sales from './sales.vue';

export default {

	name: 'DashboardIndex',

	components: { Analytics, Sales },

    route: {
      data: function (transition) {
        setTimeout(function () {
          transition.next()
        }, 1000)
      }
    },

	data: function() {
		return {
			tabAnalytics: true,
			tabSales: false
		}
	},

	methods: {
        analytics() {
            this.tabAnalytics = true
            this.tabSales = false
        },
        sales() {
            this.tabAnalytics = false
            this.tabSales = true
        },
	}

}

</script>