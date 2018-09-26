import { Home } from '../components/'

export default [
	{
		path: '/',
		component: Home,
		name: 'home',
		meta: {
			guest: false,
			needsAuth: true
		}
	},
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
