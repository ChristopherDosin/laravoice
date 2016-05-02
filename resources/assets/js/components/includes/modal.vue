<template>
  <div class="modal-mask" v-show="show" transition="modal">
    <div class="modal-wrapper">
      <div class="modal-container" :class="{ 'modal-md': md }">

      	<div class="dimmer" :class="{ 'active': loading }">
      		<div class="loading"></div>
      	</div>

        <div class="modal-header">
          <slot name="header">
            default header
          </slot>
        </div>

        <div class="modal-tabs">
        	<nav>
	        	<ul>
    				<li :class="{ 'active': tabOrga }"><a @click="orga">Organisation</a></li>
    				<li :class="{ 'active': tabPrivate }"><a @click="private">Privatperson</a></li>
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
            			<div class="form-group" :class="{ 'error': $validation1.organame.required}">
            				<label>Name der Organisation</label>
            				<input type="text" name="organame" id="organame" v-validate:organame="['required']">
        				</div>
            			<div class="form-group">
            				<label>Namenszusatz</label>
            				<input type="text">
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
				Abbrechen
			</a>
            <button class="btn btn-border green right"
              type="submit"
              :disabled=" ! $validation1.valid"
              >
            	<span v-show="! $validation1.valid">Fehler beheben</span>
            	<span v-show="$validation1.valid">Speichern</span>
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

	props: {
		show: {
		  type: Boolean,
		  required: true,
		  twoWay: true,
		},
		md: true
	},

	data(){
		return {
			tabOrga: true,
			tabPrivate: false,
			loading: false,
		}
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

        	  this.loading = true
        	  var is = this
		      // Post request
		      this.$http.post('/saveContact').then(function (response) {

		          setTimeout(function(){
					  is.loading = false
					  is.show = false
				   }, 1000);

		      }, function (response) {

		          setTimeout(function(){
					  is.loading = false
				   }, 1000);

		      });
        }
	}
}
</script>
<style lang="stylus">
@import "../../../stylus/variables";

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