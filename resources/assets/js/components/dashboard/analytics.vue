<template>
	<div class="m35">
		<div class="box">
			<h2>Analytics</h2>

			    <div style="width:700px; height:350px">
					<graph :labels="['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul']" 
					       :einnahmen="[690, 639, 700, 543, 950, 602, 845, 600, 800, 1000]"
					       :ausgaben="[400, 500, 600, 500, 800, 400, 700, 500, 700, 890]"
					       color="blue"></graph>
			    </div>

		</div>
	</div>
</template>
<script>

	import Graph from '../modules/graph';

	export default {

		name: 'Analytics',

		components: { Graph },

	}

</script>