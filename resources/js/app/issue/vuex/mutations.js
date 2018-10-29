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
* Remove the user subscription from the issue.
*
* @param {Object} state	  Vuex State
* @param {Object} user	  User
*/
export const removeIssueSubscription = (state, user) => {
	state.issue.isSubscribedTo = false;
	let index = state.issue.subscriptions.findIndex(sub => sub.user_id === user.data.id && sub.issue_id === state.issue.id);
	state.issue.subscriptions.splice(state.issue.subscriptions.indexOf(index), 1);
 };

/**
 * Push the new reply object to the existing replies of the issue.
 *
 * @param {Object} state 	Vuex state
 * @param {Object} reply 	Reply object
 */
 export const addReplyToList = (state, reply) => {
	state.issue.replies.push(reply);
 };

/**
 * Replace the reply text to the givven reply value.
 *
 * @param {Object} state 	Vuex state
 * @param {Number} id     Reply id
 * @param {String} reply   Reply text
 */
 export const replaceReply = (state, {id, reply}) => {
	var index = state.issue.replies.findIndex(rep => rep.id === id);
	state.issue.replies[index].text = reply;
 };

/**
 * Delete the reply from the issue replies.
 *
 * @param {Object} state 	Vuex state
 * @param {Number} id     Reply id
 * @param {String} reply   Reply text
 */
export const deleteReply = (state, reply) => {
	var index = state.issue.replies.findIndex(rep => rep.id === reply);
	state.issue.replies.splice(index, 1);
};
