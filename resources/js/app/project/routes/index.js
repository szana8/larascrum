import { ProjectDashboard } from '../components/';

export default [
	{
		path: '/projects',
		component: ProjectDashboard,
		name: 'projects',
		meta: {
			guest: false,
			needsAuth: true
		}
	}
]
