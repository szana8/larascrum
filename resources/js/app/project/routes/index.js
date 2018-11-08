import { ProjectDashboard, ProjectSchema } from '../components/';

export default [
	{
		path: '/projects',
		component: ProjectDashboard,
		name: 'projects',
		meta: {
			guest: false,
			needsAuth: true
		}
	},
	{
		path: '/projects/schema/:project',
		component: ProjectSchema,
		name: 'project-schema',
		props: true,
		meta: {
			guest: false,
			needsAuth: true
		}
	},
]
