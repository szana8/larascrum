import { isEmpty } from 'lodash'
import localforage from 'localforage'


export const fetchProjects = ({ commit }) => {
	return axios.get('api/projects').then((response) => {
		commit('setProjects', response.data)
	})
}

export const fetchIssues = ({ commit }, { payload }) => {
	return axios.get('api/issues', { params: payload }).then((response) => {
		commit('setIssue', response.data[0])
		commit('setIssues', response.data)
	})
}

export const loadIssuesNextPage = ({ commit }, { payload }) => {
	return axios.get('api/issues', {params: payload}).then((response) => {
		commit('concatIssues', response.data)
	})
}

export const fetchIssue = ({ commit }, { issue }) => {
	return axios.get('api/issues/' + issue).then((response) => {
		return Promise.resolve(response.data)
	})
}
