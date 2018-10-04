import { IssueDashboard } from '../components/'

export default [
	{
		path: '/issues',
		component: IssueDashboard,
		name: 'issues',
		meta: {
			guest: false,
			needsAuth: true
		}
	},
	{
		path: '/issues/:project/:type?',
		component: IssueDashboard,
		name: 'issues_with_project',
		props: true,
		meta: {
			guest: false,
			needsAuth: true
		}
	}
]
