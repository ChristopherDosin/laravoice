<template>
    <section class="row">
        <sidebar></sidebar>
        <div>
        	<div class="mai-content">
        		<router-view></router-view>
        	</div>
    	</div>
    </section>
</template>

<script>
    import sidebar from './components/includes/sidebar.vue';
    export default {
        components: { sidebar },
    };
</script>

<style lang="stylus">

</style>