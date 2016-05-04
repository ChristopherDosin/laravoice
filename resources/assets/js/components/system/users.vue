<template>

    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

		<div class="dashhead bg-light b-b">
			<section class="row pb5 mb20">
				<h1>{{ $t("system.usermanagement") }}</h1>
			</section>
		</div>


		<div class="box m35 no-padding">
			<table class="table table-striped">
			  <thead>
			    <tr>
					<th>Name</th>
					<th>Email</th>
					<th>Typ</th>
					<th>#</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr v-for="contact in contacts" class="contact-column">
					<th>{{contact.first_name}}</th>
					<th scope="row">{{contact.email}}</th>
					<td></td>
					<td></td>
			    </tr>
			  </tbody>
			</table>
		</div>

    </div>

</template>
<script>
	export default {
		name: 'UserManagement',

	    route: {
	      data: function (transition) {
	        setTimeout(function () {
	          transition.next()
	        }, 1000)
	      }
	    },

	    ready: function() {
	    	this.getContacts();
	    },

	    methods: {
	        getContacts(){
				// GET request
				this.$http({url: '/api/getContacts', method: 'GET'}).then(function (response) {
				  this.$set('contacts', response.data)
				}, function (response) {
				   console.log(response.data)
				});
	        }
	    }

	}
</script>