import { isEmpty } from 'lodash'
import localforage from 'localforage'

export const setToken = (state, token) => {
	if (isEmpty(token)) {
		localforage.removeItem('authToken', token)
		return
	}

	// Check empty remove token
	localforage.setItem('authToken', token)
}

export const setAuthenticated = (state, isAuthenticated) => {
	state.user.authenticated = isAuthenticated
}

export const setUserData = (state, data) => {
	state.user.data = data
}
