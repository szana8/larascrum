import { isEmpty } from 'lodash'
import { setHttpToken } from '../../../helpers'
import localforage from 'localforage'

export const register = ({ dispatch }, { payload, context }) => {
	return axios.post('/api/auth/signup', payload).then((response) => {
		console.log(response)
	}).catch((error) => {
		context.errors = error.response.data.errors
	})
}

export const login = ({ dispatch }, { payload, context }) => {
	return axios.post('/api/auth/login', payload).then((response) => {
			dispatch('setToken', response.data.access_token).then(() => {
			dispatch('fetchUser')
		})
	}).catch((error) => {
		context.errors = error.response.data.message
		reject(error.response.data.message)
	})
}

export const logout = ({ dispatch }) => {
	return axios.get('api/auth/logout').then((response) => {
		dispatch('clearAuthentication')
	})
}

export const fetchUser = ({ commit }) => {
	return axios.get('api/auth/user').then((response) => {
		commit('setAuthenticated', true)
		commit('setUserData', response.data)
	})
}

export const setToken = ({ commit, dispatch }, token) => {
	if (isEmpty(token)) {
		return dispatch('checkTokenExists').then((token) => {
			setHttpToken(token)
		})
	}

	commit('setToken', token)
	setHttpToken(token)
}

export const checkTokenExists = ({ commit, dispatch }, token) => {
	return localforage.getItem('authToken').then((token) => {
		if (isEmpty(token)) {
			return Promise.reject('NO_STORAGE_TOKEN')
		}

		return Promise.resolve(token)
	})
}

export const clearAuthentication = ({ commit, dispatch }) => {
	commit('setAuthenticated', false)
	commit('setUserData', null)
	commit('setToken', null)
	setHttpToken(null)
}
