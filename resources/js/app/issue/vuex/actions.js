/**
 * Load the necessary objects for the future usage.
 */
//import { isEmpty } from 'lodash';
//import localforage from 'localforage';

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
export const subscribe = ({ commit }, issue) => {
	return axios.post('/api/issues/' + issue + '/subscribe').then((response) => {
		commit('setIssueSubscription', {subscription: response.data, isSubscribed: true});
	});
};

/**
 * Subscribe the authenticated user to the givven issue.
 *
 * @param {Object} issue 	Issue
 */
export const unSubscribe = ({ commit, rootState }, issue) => {
	return axios.delete('/api/issues/' + issue + '/unsubscribe').then((response) => {
		commit('removeIssueSubscription', rootState.auth.user);
	});
};

/**
 * Update the workflow status of the issue with the givven parameter.
 *
 * @param {Number} issue 	Issue id
 * @param {Number} key 		Key of the new workflow status
 */
export const updateWorkflowStatus = ({ dispatch }, { issue, key }) => {
	return axios.put('/api/issues/' + issue + '/' +  'status/' + key).then((response) => {
		dispatch('fetchIssue', issue);
	});
};

/**
 * Add a new reply to the issue based on the givven parameters.
 *
 * @param {Number} issue 	Issue Id
 * @param {String} reply	Reply text
 */
export const replyIssue = ({ commit }, { issue, reply }) => {
	return axios.post('/api/replies/' + issue, { text: reply }).then((response) => {
		commit('addReplyToList', response.data);
		return Promise.resolve('Reply has been added');
	});
};

/**
 * Add a new reply to the issue based on the givven parameters.
 *
 * @param {Number} issue 	Issue Id
 * @param {String} reply	Reply text
 */
export const updateReply = ({ commit }, { id, reply }) => {
	return axios.put('/api/replies/' + id, { text: reply }).then((response) => {
		commit('replaceReply', {id: id, reply: reply});
		return Promise.resolve('Reply has been updated');
	});
};
