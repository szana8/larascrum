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
	}
]
