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
          }
        })

        router.alias({
            '': '/dashboard'
        })
    }
}