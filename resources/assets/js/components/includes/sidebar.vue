<template>
    <div class="sidebar">
        <ul class="nav nav-sidebar">
            <li class="title">Menu <i class="fa fa-bars" aria-hidden="true"></i></li>
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
<style lang="stylus">
li.seperator {
    background:#313d4f;
    height:1px;
    margin:20px 0;
}
li.title {
    color: #5b6779;
    text-transform: uppercase;
    font-size: 12px;
    margin: 30px 30px 15px 6px;
    font-weight: 700;
    list-style: none;
    border:none;
    i {
        float:right;
        font-size 14px
        line-height 17.5px
    }
    &:hover {
        background:none;
        border:none;
    }
}
</style>
