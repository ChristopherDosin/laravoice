<template>

    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

		<div class="dashhead bg-light b-b">
			<section class="row pb5 mb20">
				<h1>Settings</h1>
			</section>
		</div>

    </div>

</template>
<script>
	export default {
		name: 'Settings',

	    route: {
	      data: function (transition) {
	        setTimeout(function () {
	          transition.next()
	        }, 1000)
	      }
	    },

	}
</script>