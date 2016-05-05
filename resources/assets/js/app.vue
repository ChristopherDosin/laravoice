<template>
    <section class="row">
        <sidebar></sidebar>
        <div>
        	<div class="main">
        		<router-view></router-view>
        	</div>
    	</div>
    </section>
</template>

<script>
    import sidebar from './components/includes/sidebar.vue';
    import store from './vuex/store'

    export default {
        components: { sidebar },
        store: store // make this and all child components aware of the new store
    };
</script>

<style lang="stylus">
.main > div > .box {
    position: fixed;
    height: calc(100% - 220px);
    width: calc(100% - 270px);
    top: 160px;
    overflow: auto;
    z-index: 1;
}
</style>