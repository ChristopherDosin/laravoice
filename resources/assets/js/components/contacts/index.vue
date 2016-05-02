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
						<a @click="sales">Lieferanten</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">Kunden</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">Partner</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">Interessenten</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="box m35 no-padding">
			<table class="table table-striped">
			  <thead>
			    <tr>
					<th>{{ trans('contacts.typ') }}</th>
			      <th>KdNr.</th>
			      <th>Name</th>
					<th>Ort</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr v-for="contact in contacts" class="contact-column">
					<th>
						<div class="contact-type">
							<div v-if="contact.usertype.id == 1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<span class="contact-type-label" style="background-color:#3966b2">K</span>
							</div>
							<div v-if="contact.usertype.id == 2">
								<i class="fa fa-building-o" aria-hidden="true"></i>
								<span class="contact-type-label" style="background-color:#d6cb16">L</span>
							</div>
							<div v-if="contact.usertype.id == 3">
								<i class="fa fa-building-o" aria-hidden="true"></i>
								<span class="contact-type-label" style="background-color:#d6cb16">L</span>
							</div>
							<div v-if="contact.usertype.id == 4">
								<i class="fa fa-building-o" aria-hidden="true"></i>
								<span class="contact-type-label" style="background-color:#8339b2">P</span>
							</div>
						</div>
					</th>
			      <th scope="row">{{contact.id}}</th>
			      <td>{{contact.billingaddress.company}}</td>
					<td>{{contact.billingaddress.postalcode}} {{contact.billingaddress.city}}</td>
			    </tr>
			  </tbody>
			</table>
		</div>

	</div>


</template>
<style lang="stylus">
	table {
		font-size:13px;
		cursor: pointer!important;
	tr {
		&:hover {
			 background: rgba(195,195,195,.18);
		 }
	}
		thead {
		tr:hover {
			background:none;
		}
			th {
				padding-left: 0;
			}
		}
	}
	.contact-column {
		th, td {
			padding: 18px 0 5px 0;
		}
	}
	.contact-type {
		overflow: hidden;
		padding-bottom: 15px;
		padding-bottom: 10px;
		.fa {
			font-size: 20px;
		}
		span {
			color: #fff;
			position: relative;
			top: 5px;
			left: -7px;
			padding-left: 3px;
			padding-right: 3px;
			font-size: 10px;
		}
	}
</style>
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

	computed: {

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