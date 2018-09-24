import { Login } from '../components/'

export default [
	{
		path: '/login',
		component: Login,
		name: 'login',
		meta: {
			guest: true,
			needsAuth: false
		}
	}
]
