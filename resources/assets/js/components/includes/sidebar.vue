<template>
    <div class="sidebar">
    	<h3>Reports</h3>
        <ul class="nav nav-sidebar">
            <li v-link-active>
            	<a v-link="{ path: 'dashboard'}"><i class="fa fa-deaf" aria-hidden="true"></i>
            	Dashboard</a>
            </li>
            <li v-link-active>
            	<a v-link="{ path: 'crm'}"><i class="fa fa-users" aria-hidden="true"></i>
            	Kontakte</a>
            </li>
        </ul>
    </div>
</template>
<script>

    export default {
        name: 'Sidebar'
    }

</script>