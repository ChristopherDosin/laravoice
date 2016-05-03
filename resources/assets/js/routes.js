module.exports = {

    configRouter: function (router) {

        router.map({
	      '/dashboard': {
	        component: require('./components/dashboard/index.vue'),
		        subRoutes: {
		          '/': {
		            component: require('./components/dashboard/index.vue')
		          },
		          '/analytics': {
		            component: require('./components/dashboard/analytics.vue')
		          }
		        }
	       },
          '/analytics': {
            component: require('./components/dashboard/analytics.vue')
          },
          '/crm': {
            component: require('./components/contacts/index.vue')
          },
          '/system/settings': {
            component: require('./components/system/settings.vue')
          },
          '/system/company': {
            component: require('./components/system/company.vue')
          }
        })

        router.alias({
            '': '/dashboard'
        })
    }
}