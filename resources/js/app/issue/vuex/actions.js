/**
 * Load the necessary objects for the future usage.
 */
import { isEmpty } from 'lodash';
import localforage from 'localforage';

/**
 * Fetch the project list and set it to the project state, only those
 * projects can be listed which has a permisson of the user.
 */
export const fetchProjects = ({ commit }) => {
	return axios.get('/api/projects').then((response) => {
		commit('setProjects', response.data);
	});
};

/**
 * Fetch the list of the issues based on the payload parameter which
 * contains all of the filters and pagination data, than set the list
 * of the issues and set the details with the first element from
 * the list.
 *
 * @param {Object} payload	The filter object
 */
export const fetchIssues = ({ commit, dispatch }, { payload }) => {
	return axios.get('/api/issues', { params: payload }).then((response) => {
		commit('setIssues', response.data);
		dispatch('selectIssue', response.data.data[0].id);
	});
};

/**
 * When the user scroll down the issue list, load the next page of
 * the content, and concatenate to the current list of the issues.
 *
 * @param {Object} payload	The filter object
 */
export const loadIssuesNextPage = ({ commit }, { payload }) => {
	return axios.get('/api/issues', { params: payload }).then((response) => {
		commit('concatIssues', response.data);
	});
};

/**
 * Fetch the issue details based on the givven parameter, than set the
 * issue state with the result.
 *
 * @param {Number} issue	Issue
 */
export const fetchIssue = ({ commit }, issue) => {
	return axios.get('/api/issues/' + issue).then((response) => {
		commit('setIssue', response.data.data)
	});
};

/**
 * Set the selected issue id to mark the issue card as acitve in
 * the list, than load the issue details.
 *
 * @param {Object} issue 	Issue
 */
export const selectIssue = ({ commit, dispatch }, issue) => {
	dispatch('fetchIssue', issue);
	commit('setSelectedIssue', issue);
};

/**
 * Subscribe the authenticated user to the givven issue.
 *
 * @param {Object} issue 	Issue
 */
export const subscribe = ({ commit, dispatch }, issue) => {
	return axios.post('/api/issues/' + issue + '/subscribe').then((response) => {
		commit('setIssueSubscription', {subscription: response.data, isSubscribed: true});
	});
};

/**
 * Subscribe the authenticated user to the givven issue.
 *
 * @param {Object} issue 	Issue
 */
export const unSubscribe = ({ commit, dispatch }, issue) => {
	return axios.delete('/api/issues/' + issue + '/unsubscribe').then((response) => {
		commit('removeIssueSubscription', false);
	});
};
