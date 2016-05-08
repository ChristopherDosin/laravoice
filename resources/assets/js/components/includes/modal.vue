<template>
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container" :class="{ 'modal-md': md }">

      	<div class="dimmer" :class="{ 'active': loading }">
      		<div class="loading" v-if="spinner"></div>
          <div class="checkmark-wrapper" v-if="check">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 98.5 98.5" enable-background="new 0 0 98.5 98.5" xml:space="preserve">
            <path class="checkmark" fill="none" stroke-width="8" stroke-miterlimit="10" d="M81.7,17.8C73.5,9.3,62,4,49.2,4
            C24.3,4,4,24.3,4,49.2s20.3,45.2,45.2,45.2s45.2-20.3,45.2-45.2c0-8.6-2.4-16.6-6.5-23.4l0,0L45.6,68.2L24.7,47.3"/>
            </svg>
          </div>
      	</div>

        <div class="modal-header">
          <slot name="header">
            default header
          </slot>
        </div>

        <div class="modal-tabs">
        	<nav>
	        	<ul>
    				<li :class="{ 'active': tabOrga }"><a @click="orga">{{ $t("contact.modal.organisation") }}</a></li>
    				<li :class="{ 'active': tabPrivate }"><a @click="private">{{ $t("contact.modal.private_person") }}</a></li>
	        	</ul>
        	</nav>
        </div>
        
         <validator name="validation1">

         <!--
        <div class="modal-error" v-if=" ! $validation1.valid">
        	<p v-if="$validation1.organame.required"><i class="fa fa-exclamation" aria-hidden="true"></i>
        	Der Name der Organisation fehlt.</p>
        </div>
        -->

        <form v-on:submit.prevent="saveContact" novalidate>

        <div class="modal-body" v-show="tabOrga">
          <slot name="body">
           
            	<div class="row">

              		<div class="half-column">
              			<div class="form-group" :class="{ 'error': $validation1.organisation.minlength}">
              				<label>{{ $t("contact.modal.name_of_the_organisation") }}</label>
              				<input type="text" name="organisation" id="organisation" v-validate:organisation="{minlength: 3, required: true}" v-model="contact.organisation">
          				  </div>
              			<div class="form-group">
              				<label>{{ $t("contact.modal.additional_name") }}</label>
              				<input type="text">
          				</div>
            		</div>

                <div class="half-column">
                    <div class="form-group">
                      <label>{{ $t("contact.modal.client_number") }}</label>
                      <input type="text" name="client_number" id="client_number">
                    </div>
                    <div class="form-group">
                      <label>{{ $t("contact.type") }}</label>
                        <select class="form-control" name="contact_type_id" v-model="contact.contact_type_id">
                          <option v-for="type in contactType"
                                  value="{{type.id}}"
                                  selected="selected"
                          >{{type.name}}</option>
                        </select>
                    </div>
                  </div>

            	</div>
          
          </slot>
        </div>

        <div class="modal-body" v-show="tabPrivate">
          <slot name="body">
            Private
          </slot>
        </div>

        <div class="modal-footer">
          <slot name="footer">
			<a class="btn btn-border left"
				@click="close">
				{{ $t("contact.modal.cancel") }}
			</a>
            <button class="btn btn-border green right"
              type="submit"
              :disabled=" ! $validation1.valid"
              >
            	<span v-show="! $validation1.valid">{{ $t("contact.modal.fix_errors") }}</span>
            	<span v-show="$validation1.valid">{{ $t("contact.modal.save") }}</span>
            </button>
          </slot>
        </div>

        </form>
        </validator>

      </div>
    </div>
  </div>
</template>
<script>
import $ from 'jquery';

export default {
	name: 'ModalComponent',

	data(){
		return {
            tabOrga: true,
            tabPrivate: false,
            loading: false,
            spinner: false,
            check: false,
            contactType: {},
            contact: {
                organisation: "",
                contact_type_id: "1",
                id: ""
            }
		}
	},

    ready(){
        this.getContactTypes()
    },

    props: {
        show: {
            type: Boolean,
            required: true,
            twoWay: true,
        },
        md: true
    },

	methods: {
        close() {
            this.show = false
        },
        orga() {
            this.tabOrga = true
            this.tabPrivate = false
        },
        private() {
            this.tabOrga = false
            this.tabPrivate = true
        },
        saveContact(){

          this.spinner = true
          this.loading = true
          this.check = false

          var is = this
          // Post request
          this.$http.post('/api/saveContact', this.contact).then(function (response) {

              this.$dispatch('addContactToList', this.contact);
              console.log(response.data);

          setTimeout(function(){
                is.spinner = false
                is.check = true

            setTimeout(function(){
                is.loading = false
                is.show = false
                is.$resetValidation()
                is.$router.go('/crm/detail/id/' + response.data.id);
            }, 2000);

          }, 1000);


          }, function (response) {

              console.log(response.data);

            setTimeout(function(){
              is.loading = false
            }, 1000);

          });

        },

        getContactTypes() {
            // GET request
            this.$http({url: '/api/getContactTypes', method: 'GET'}).then(function (response) {
            this.$set('contactType', response.data)
            }, function (response) {
                console.log(response.data)
            });
        }
	}
}
</script>
<style lang="stylus">
@import "../../../stylus/variables";

.checkmark-wrapper {
  width: 100px;
  margin: 25% auto;
}

.checkmark {
  stroke: green;
  stroke-dashoffset: 745.74853515625;
  stroke-dasharray: 745.74853515625;
  animation: dash 2s ease-out forwards infinite;
}

@keyframes dash {
  0% {
    stroke-dashoffset: 745.74853515625;
  }
  100% {
    stroke-dashoffset: 0;
  }
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-error {
	background: error;
	padding:20px 36px;
	border-bottom:solid 1px error-border
	color: error-color
	font-weight 600
}

.modal-tabs {
	background:#222c3c;
	padding:0 36px;
	li {
		float: left;
    	margin-right: 30px;
    	a {
		    color: #848c98;
		    font-weight: 600;
		    font-size: 14px;
		    padding: 20px 0 17px 0;
		    display: block;
		    transition: color 0.1s ease-in-out 0s;
		    border-bottom: solid 4px transparent !important;
    	}
    	&.active, &:hover {
    		a {
    			border-bottom: solid 4px #2096f0 !important;
    			color: white !important;
    		}
    	}
	}
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  border-radius 4px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
  position: relative;
	&.modal-md {
		width:600px !important;
	}
}

.modal-header {
	background: #2096f0;
	padding:22px 36px;
	border-top-left-radius:4px;
	border-top-right-radius:4px;
	h3 {
		color: white;
		font-size: 16px;
		font-weight 600;
	}
}

.modal-body {
  padding:22px 36px;
  background:white;
  input {
    border-radius 2px
  }
}

.modal-default-button {
  float: right;
}

.modal-footer {
	overflow: hidden;
	background:#f0f3f8;
	padding:13px 36px;
	border-bottom-left-radius:4px;
	border-bottom-right-radius:4px;
}

.modal-enter, .modal-leave {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>