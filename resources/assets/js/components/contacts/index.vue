<template>

    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

		<div class="dashhead bg-light b-b">
			<section class="row b-b b-b-light pb25 mb20">
				<div class="half-column">
					<h1>Kontakte</h1>
				</div>
				<div class="half-column">
					<a class="btn btn-border green right" @click="showModal = true">Kontakt erstellen</a>

					  <!-- use the modal component, pass in the prop -->
					  <modal :show.sync="showModal" :md="true">
					    <!--
					      you can use custom content here to overwrite
					      default content
					    -->
					    <h3 slot="header">Kontakt erstellen</h3>
					  </modal>

				</div>
			</section>
			<nav class="">
				<ul>
					<li :class="{'active': tabAnalytics}">
						<a @click="analytics">Alle</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">Sales</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="box m35 no-padding">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th>KdNr.</th>
			      <th>Vorname</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr v-for="contact in contacts">
			      <th scope="row">{{contact.id}}</th>
			      <td>{{contact.first_name}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>

	</div>


</template>
<script>

import Modal from '../includes/modal.vue';

export default {

	name: 'ContactsIndex',

	components: { Modal },

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
			tabSales: false,
			contacts: this.getContacts,
			showModal: false
		}
	},

	ready: function() {
		this.getContacts()
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
        getContacts(){
			// GET request
			this.$http({url: '/getContacts', method: 'GET'}).then(function (response) {
			  this.$set('contacts', response.data)
			}, function (response) {
			   console.log(response.data)
			});
        }
	}

}

</script>