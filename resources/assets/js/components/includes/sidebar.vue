<template>
    <div class="sidebar">
    	<h3>Reports</h3>
        <ul class="nav nav-sidebar">
            <li v-link-active>
            	<a v-link="{ path: '/dashboard', activeClass: 'active'}"><i class="fa fa-deaf" aria-hidden="true"></i>
            	{{ $t("sidebar.dashboard") }}</a>
            </li>
            <li v-link-active>
            	<a v-link="{ path: '/crm', activeClass: 'active'}"><i class="fa fa-users" aria-hidden="true"></i>
            	{{ $t("sidebar.contacts") }}</a>
            </li>
        </ul>
    </div>
</template>
<script>

    export default {

        name: 'Sidebar',

    }

</script>