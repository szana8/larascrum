/**
 * Load the necessary objects for the future usage.
 */
import { isEmpty } from 'lodash';
import localforage from 'localforage';

/**
 * Set the project state based on the givven parameter
 *
 * @param {Object} state		Vuex State
 * @param {Object} projects 	Projects list
 */
export const setProjects = (state, projects) => {
	state.projects = projects;
};

/**
 * Set the issue list state based on the givven parameter
 *
 * @param {Object} state	Vuex State
 * @param {Object} issues 	Issues object
 */
export const setIssues = (state, issues) => {
	state.issues = issues;
};

/**
 * Concatenate the issues list based on the givven parameter
 *
 *  @param {Object} state	Vuex State
 * @param {Object} issues 	Issues object
 */
export const concatIssues = (state, issues) => {
	state.issues.meta = issues.meta;
	state.issues.data = state.issues.data.concat(issues.data);
};

/**
 * Set the issue state based on the givven Issue object.
 *
 * @param {Object} state	Vuex State
 * @param {Object} issue 	Issue object
 */
export const setIssue = (state, issue) => {
	state.issue = issue;
};

/**
 * Set the replies of the issue based on the givven parameter.
 *
 * @param {Object} state	Vuex State
 * @param {Object} replies	Replies object
 */
export const setIssueReplies = (state, replies) => {
	state.issue.replies = replies;
};

/**
 * Set the selected issue id to mark the active issue on the list.
 *
 * @param {Object} state	  Vuex State
 * @param {Number} issue	Issue id
 */
export const setSelectedIssue = (state, issue) => {
	state.selectedIssue = issue;
};

/**
 * Set the selected project id to mark the active project on the list.
 *
 * @param {Object} state	  Vuex State
 * @param {Number} project	Project id
 */
export const setSelectedProject = (state, project) => {
	state.selectedProject = project;
};

/**
* Set the selected priority object to mark the active priority on the list.
*
* @param {Object} state	  Vuex State
* @param {Object} priority	Priority
*/
export const setSelectedPriority = (state, priority) => {
   state.selectedPriority = priority;
};

/**
* Set the issue object subscribe properties to the prover value.
*
* @param {Object} state	  Vuex State
* @param {Object} priority	Subscription
*/
export const setIssueSubscription = (state, { subscription, isSubscribed }) => {
	state.issue.isSubscribedTo = isSubscribed;
	state.issue.subscriptions = subscription;
 };

/**
* Set the issue object subscribe properties to the prover value.
*
* @param {Object} state	  Vuex State
* @param {Object} priority	Subscription
*/
export const removeIssueSubscription = (state, isSubscribed) => {
	state.issue.isSubscribedTo = isSubscribed;
	//console.log(rootState)
	//let index = state.issue.subscriptions.findIndex(sub => sub.user_id === state.auth.user.data.id && sub.issue_id === state.issue.id);
	//state.issue.subscriptions.splice(this.issue.subscriptions.indexOf(index), 1);
 };
