<template>

    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

		<div class="dashhead bg-light b-b">
			<section class="row pb5 mb20">
				<h1>{{ $t("system.company") }}</h1>
			</section>
		</div>

		<section class="row">
			<div class="half-column">
				<div class="box m35 dashhead no-padding">
					<div class="box-head b-b">
						<nav class="">
							<ul>
								<li :class="{'active': tabGeneral}">
									<a @click="analytics">{{ $t("system.general") }}</a>
								</li>
								<li :class="{'active': tabBankaccount}">
									<a @click="analytics">{{ $t("system.tabBankaccount") }}</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="box-content">
					<p>Content</p>
					</div>
				</div>
			</div>
		</section>

    </div>

</template>
<script>
	export default {
		name: 'Company',

	    route: {
	      data: function (transition) {
	        setTimeout(function () {
	          transition.next()
	        }, 1000)
	      }
	    },

	    data(){
	    	return {
	    		tabGeneral: true,
	    		tabBankaccount: false
	    	}
	    },

	    methods: {

	    }

	}
</script>