<template>

    <div class="vue-loading" v-if="$loadingRouteData">
        <div class="loader">Loading ...</div>
    </div>

    <div v-if="!$loadingRouteData">

		<div class="dashhead bg-light b-b">
			<section class="row b-b b-b-light pb25 mb20">
				<div class="half-column">
					<h1>{{ $t("contact.contacts") }}</h1>
				</div>
				<div class="half-column">
					<a class="btn btn-border green right" @click="showModal = true">{{ $t("contact.create_contact") }}</a>

					  <!-- use the modal component, pass in the prop -->
					  <modal :show.sync="showModal" :md="true">
					    <!--
					      you can use custom content here to overwrite
					      default content
					    -->
					    <h3 slot="header">{{ $t("contact.create_contact") }}</h3>
					  </modal>

				</div>
			</section>

			<nav class="">
				<ul>
					<li :class="{'active': tabAnalytics}">
						<a @click="analytics">{{ $t("contact.all") }}</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">{{ $t("contact.suppliers") }}</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">{{ $t("contact.clients") }}</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">{{ $t("contact.partner") }}</a>
					</li>
					<li :class="{'active': tabSales}">
						<a @click="sales">{{ $t("contact.interested_persons") }}</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="box m35 no-padding">
			<table class="table table-striped">
			  <thead>
			    <tr>
					<th>{{ $t("contact.type") }}</th>
			      <th>{{ $t("contact.client_number") }}</th>
			      <th>{{ $t("contact.name") }}</th>
					<th>{{ $t("contact.city") }}</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr v-for="contact in contacts" class="contact-column">
					<th>
						<div class="contact-type">
							<div>
								<i class="fa {{ getIcon(contact.type.id) }}" aria-hidden="true"></i>
								<span class="contact-type-label" :style="{ 'background-color': contact.type.color }">{{contact.type.shortcut}}</span>
							</div>
						</div>
					</th>
			      <th scope="row">{{contact.id}}</th>
					<td v-if="contact.organisation">{{contact.organisation}}</td>
					<td v-else>{{contact.last_name}}</td>

					<td><span v-if="contact.billing.postalcode">{{contact.billing.postalcode}} {{contact.billing.city}}</span></td>
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
			showModal: false,
		}
	},

	ready: function() {
		this.getContacts()
	},

	events: {
		'addContactToList': function (msg) {
			// Listen for the Event if a new contact was created
            // and make a new API Call to get the new contact
            this.$http({url: '/api/getContacts', method: 'GET'}).then(function (response) {
                this.$set('contacts', response.data)
            });

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
        getContacts(){
			// GET request
			this.$http({url: '/api/getContacts', method: 'GET'}).then(function (response) {
			  this.$set('contacts', response.data)
			}, function (response) {
			   console.log(response.data)
			});
        },
		getIcon(id) {
			switch (id) {
				case 1:
					return 'fa-user'
					break
				case 2:
					return 'fa-building-o'
					break
				case 3:
					return 'fa-user'
					break
				default:
					return 'fa-building-o'
			}
		}
	}

}

</script>