<template>
	<div>

	</div>
</template>
<script>
	export default {
		name: 'System',

	    route: {
	      data: function (transition) {
	        setTimeout(function () {
	          transition.next()
	        }, 1000)
	      }
	    },

	}
</script>