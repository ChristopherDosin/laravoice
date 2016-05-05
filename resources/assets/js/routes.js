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
            component: require('./components/contacts/index.vue'),
          },
            '/crm/detail/id/:id': {
                name: 'contactDetail',
                component: require('./components/contacts/detail.vue')
            },
          '/system/settings': {
            component: require('./components/system/settings.vue')
          },
          '/system/company': {
            component: require('./components/system/company.vue')
          },
          '/system/usermanagement': {
            component: require('./components/system/users.vue')
          }
        })

        router.alias({
            '': '/dashboard'
        })
    }
}