import { Home } from '../components/'

export default [
	{
		path: '/home',
		component: Home,
		name: 'home',
		meta: {
			guest: false,
			needsAuth: true
		}
	}
]
